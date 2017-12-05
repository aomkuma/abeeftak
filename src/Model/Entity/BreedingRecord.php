<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BreedingRecord Entity
 *
 * @property string $id
 * @property \Cake\I18n\FrozenDate $breeding_date
 * @property string $mother_code
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $updated
 * @property string $updatedby
 * @property string $cow_id
 */
class BreedingRecord extends Entity
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
        'breeding_date' => true,
        'mother_code' => true,
        'created' => true,
        'createdby' => true,
        'updated' => true,
        'updatedby' => true,
        'cow_id' => true
    ];
}
