<?php
namespace Bake\View\Helper;

use Cake\Collection\Collection;
use Cake\Database\Type;
use Cake\ORM\Association;
use Cake\View\Helper;

/**
 * DocBlock helper
 */
class DocBlockHelper extends Helper
{
    protected $_annotationSpacing = true;

    /**
     * Writes the DocBlock header for a class which includes the property and method declarations. Annotations are
     * sorted and grouped by type and value. Groups of annotations are separated by blank lines.
     *
     * @param string $className The class this comment block is for.
     * @param string $classType The type of class (example, Entity)
     * @param array $annotations An array of PHP comment block annotations.
     * @return string The DocBlock for a class header.
     */
    public function classDescription($className, $classType, array $annotations)
    {
        $lines = [];
        if ($className && $classType) {
            $lines[] = "{$className} {$classType}";
            $lines[] = "";
        }

        $previous = false;
        foreach ($annotations as $ann) {
            if (strlen($ann) > 1 && $ann[0] === '@' && strpos($ann, ' ') > 0) {
                $type = substr($ann, 0, strpos($ann, ' '));
                if ($this->_annotationSpacing &&
                    $previous !== false &&
                    $previous !== $type
                ) {
                    $lines[] = '';
                }
                $previous = $type;
            }
            $lines[] = $ann;
        }

        $lines = array_merge(["/**"], (new Collection($lines))->map(function ($line) {
            return rtrim(" * {$line}");
        })->toArray(), [" */"]);

        return implode("\n", $lines);
    }

    /**
     * Converts an entity class type to its DocBlock hint type counterpart.
     *
     * @param string $type The entity class type (a fully qualified class name).
     * @param \Cake\ORM\Association $association The association related to the entity class.
     * @return string The DocBlock type
     */
    public function associatedEntityTypeToHintType($type, Association $association)
    {
        if ($association->type() === Association::MANY_TO_MANY ||
            $association->type() === Association::ONE_TO_MANY
        ) {
            return $type . '[]';
        }

        return $type;
    }

    /**
     * Builds a map of entity columns as DocBlock types for use
     * in generating `@property` hints.
     *
     * This method expects a property schema as generated by
     * `\Bake\Shell\Task\ModelTask::getEntityPropertySchema()`.
     *
     * The generated map has the format of
     *
     * ```
     * [
     *     'property-name' => 'doc-block-type',
     *     ...
     * ]
     * ```
     *
     * @see \Bake\Shell\Task\ModelTask::getEntityPropertySchema
     *
     * @param array $propertySchema The property schema to use for generating the type map.
     * @return array The property DocType map.
     */
    public function buildEntityPropertyHintTypeMap(array $propertySchema)
    {
        $properties = [];
        foreach ($propertySchema as $property => $info) {
            if ($info['kind'] === 'column') {
                $properties[$property] = $this->columnTypeToHintType($info['type']);
            }
        }

        return $properties;
    }

    /**
     * Builds a map of entity associations as DocBlock types for use
     * in generating `@property` hints.
     *
     * This method expects a property schema as generated by
     * `\Bake\Shell\Task\ModelTask::getEntityPropertySchema()`.
     *
     * The generated map has the format of
     *
     * ```
     * [
     *     'property-name' => 'doc-block-type',
     *     ...
     * ]
     * ```
     *
     * @see \Bake\Shell\Task\ModelTask::getEntityPropertySchema
     *
     * @param array $propertySchema The property schema to use for generating the type map.
     * @return array The property DocType map.
     */
    public function buildEntityAssociationHintTypeMap(array $propertySchema)
    {
        $properties = [];
        foreach ($propertySchema as $property => $info) {
            if ($info['kind'] === 'association') {
                $type = $this->associatedEntityTypeToHintType($info['type'], $info['association']);
                if ($info['association']->type() === Association::MANY_TO_ONE) {
                    $properties = $this->_insertAfter(
                        $properties,
                        $info['association']->foreignKey(),
                        [$property => $type]
                    );
                } else {
                    $properties[$property] = $type;
                }
            }
        }

        return $properties;
    }

    /**
     * Converts a column type to its DocBlock type counterpart.
     *
     * This method only supports the default CakePHP column types,
     * custom column/database types will be ignored.
     *
     * @see \Cake\Database\Type
     *
     * @param string $type The column type.
     * @return null|string The DocBlock type, or `null` for unsupported column types.
     */
    public function columnTypeToHintType($type)
    {
        switch ($type) {
            case 'string':
            case 'text':
            case 'uuid':
                return 'string';

            case 'integer':
            case 'biginteger':
            case 'smallinteger':
            case 'tinyinteger':
                return 'int';

            case 'float':
            case 'decimal':
                return 'float';

            case 'boolean':
                return 'bool';

            case 'binary':
                return 'string|resource';

            case 'date':
            case 'datetime':
            case 'time':
            case 'timestamp':
                $dbType = Type::build($type);
                if (method_exists($dbType, 'getDateTimeClassName')) {
                    return '\\' . Type::build($type)->getDateTimeClassName();
                }

                return '\Cake\I18n\Time';
        }

        return null;
    }

    /**
     * Renders a map of DocBlock property types as an array of
     * `@property` hints.
     *
     * @param array $properties A key value pair where key is the name of a property and the value is the type.
     * @return array
     */
    public function propertyHints(array $properties)
    {
        $lines = [];
        foreach ($properties as $property => $type) {
            $type = $type ? $type . ' ' : '';
            $lines[] = "@property {$type}\${$property}";
        }

        return $lines;
    }

    /**
     * Inserts a value after a specific key in an associative array.
     *
     * In case the given key cannot be found, the value will be appended.
     *
     * @param array $target The array in which to insert the new value.
     * @param string $key The array key after which to insert the new value.
     * @param mixed $value The entry to insert.
     * @return array The array with the new value inserted.
     */
    protected function _insertAfter(array $target, $key, $value)
    {
        $index = array_search($key, array_keys($target));
        if ($index !== false) {
            $target = array_merge(
                array_slice($target, 0, $index + 1),
                $value,
                array_slice($target, $index + 1, null)
            );
        } else {
            $target += (array)$value;
        }

        return $target;
    }
}
