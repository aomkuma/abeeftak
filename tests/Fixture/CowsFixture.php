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
        'breed_level' => ['type' => 'string', 'length' => 35, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
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
        'isapproved' => ['type' => 'string', 'length' => null, 'null' => true, 'default' => 'N', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
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
            'id' => 'dfac583a-99ea-4f8b-a4c3-f03c6f3c5e9d',
            'code' => 'Lorem ip',
            'grade' => 'Lorem ipsum dolor sit amet',
            'breed_level' => 'Lorem ipsum dolor sit amet',
            'birthday' => '2018-02-24',
            'gender' => 'Lorem ipsum dolor sit amet',
            'isbreeder' => 'Lorem ipsum dolor sit amet',
            'cow_breed_id' => '49867908-5687-4f53-93d3-dc50080e2146',
            'breeding' => 'Lorem ipsum dolor sit amet',
            'father_code' => 'Lorem ipsum dolor ',
            'mother_code' => 'Lorem ipsum dolor ',
            'origins' => 'Lorem ipsum dolor sit amet',
            'import_date' => '2018-02-24',
            'description' => 'Lorem ipsum dolor sit amet',
            'created' => '2018-02-24 08:28:51',
            'createdby' => 'Lorem ipsum dolor sit amet',
            'updated' => '2018-02-24 08:28:51',
            'updatedby' => 'Lorem ipsum dolor sit amet',
            'isapproved' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
