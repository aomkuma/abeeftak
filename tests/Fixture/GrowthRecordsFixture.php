<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GrowthRecordsFixture
 *
 */
class GrowthRecordsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'type' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => 'F', 'collate' => 'utf8_general_ci', 'comment' => 'F:fertilize,W:wean', 'precision' => null, 'fixed' => null],
        'record_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'age' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'weight' => ['type' => 'decimal', 'length' => 6, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'chest' => ['type' => 'decimal', 'length' => 6, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'height' => ['type' => 'decimal', 'length' => 6, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'length' => ['type' => 'decimal', 'length' => 6, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'growth_stat' => ['type' => 'decimal', 'length' => 6, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'food_type' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'total_eating' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'description' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'createdby' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'updated' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'updatedby' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'cow_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 'e4db83e2-42ae-436c-82ed-274818d2a4e2',
            'type' => 'Lorem ipsum dolor sit amet',
            'record_date' => '2017-12-05',
            'age' => 'Lorem ipsum dolor sit amet',
            'weight' => 1.5,
            'chest' => 1.5,
            'height' => 1.5,
            'length' => 1.5,
            'growth_stat' => 1.5,
            'food_type' => 'Lorem ipsum dolor sit amet',
            'total_eating' => 'Lorem ipsum dolor sit amet',
            'description' => 'Lorem ipsum dolor sit amet',
            'created' => '2017-12-05',
            'createdby' => 'Lorem ipsum dolor sit amet',
            'updated' => '2017-12-05 14:55:05',
            'updatedby' => 'Lorem ipsum dolor sit amet',
            'cow_id' => '36d508ff-c3bb-4489-a9cf-b679d60c64ac'
        ],
    ];
}
