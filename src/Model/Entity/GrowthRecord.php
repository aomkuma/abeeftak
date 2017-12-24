<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GrowthRecord Entity
 *
 * @property string $id
 * @property string $type
 * @property \Cake\I18n\FrozenDate $record_date
 * @property string $age
 * @property float $weight
 * @property float $chest
 * @property float $height
 * @property float $length
 * @property float $growth_stat
 * @property string $food_type
 * @property string $total_eating
 * @property string $description
 * @property \Cake\I18n\FrozenDate $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $updated
 * @property string $updatedby
 * @property string $cow_id
 */
class GrowthRecord extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'type' => true,
        'record_date' => true,
        'age' => true,
        'weight' => true,
        'chest' => true,
        'height' => true,
        'length' => true,
        'weight1' => true,
        'chest1' => true,
        'height1' => true,
        'length1' => true,
        'growth_stat' => true,
        'food_type' => true,
        'total_eating' => true,
        'description' => true,
        'created' => true,
        'createdby' => true,
        'updated' => true,
        'updatedby' => true,
        'cow_id' => true
    ];
}
