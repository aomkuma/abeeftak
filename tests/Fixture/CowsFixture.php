<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CowsFixture
 *
 */
class CowsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'code' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'grade' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'birthday' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'gender' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => 'F', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'isbreeder' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => 'Y', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'cow_breed_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'breeding' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => 'NM', 'collate' => 'utf8_general_ci', 'comment' => 'AI:artificial insemination,NM: Normal', 'precision' => null, 'fixed' => null],
        'father_code' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'mother_code' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'origins' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => 'IN', 'collate' => 'utf8_general_ci', 'comment' => 'IN:in the country,IM: Import', 'precision' => null, 'fixed' => null],
        'import_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'description' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'createdby' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'updated' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'updatedby' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
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
            'id' => 'bb377b4e-2b9c-471b-bb56-cc2616450a2f',
            'code' => 'Lorem ip',
            'grade' => 'Lorem ipsum dolor sit amet',
            'birthday' => '2017-12-05',
            'gender' => 'Lorem ipsum dolor sit amet',
            'isbreeder' => 'Lorem ipsum dolor sit amet',
            'cow_breed_id' => 'd7de165e-de3f-445e-98ef-40956a3e0412',
            'breeding' => 'Lorem ipsum dolor sit amet',
            'father_code' => 'Lorem ipsum dolor ',
            'mother_code' => 'Lorem ipsum dolor ',
            'origins' => 'Lorem ipsum dolor sit amet',
            'import_date' => '2017-12-05',
            'description' => 'Lorem ipsum dolor sit amet',
            'created' => '2017-12-05 14:52:14',
            'createdby' => 'Lorem ipsum dolor sit amet',
            'updated' => '2017-12-05 14:52:14',
            'updatedby' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
