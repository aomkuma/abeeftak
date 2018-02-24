<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Givebirthrecord Entity
 *
 * @property string $id
 * @property \Cake\I18n\FrozenDate $breeding_date
 * @property string $father_code
 * @property string $authorities
 * @property string $breeding_status
 * @property string $breeding_type
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $updated
 * @property string $updatedby
 * @property string $cow_id
 *
 * @property \App\Model\Entity\Cow $cow
 */
class Givebirthrecord extends Entity
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
        'father_code' => true,
        'authorities' => true,
        'breeding_status' => true,
        'breeding_type' => true,
        'created' => true,
        'createdby' => true,
        'updated' => true,
        'updatedby' => true,
        'cow_id' => true,
        'cow' => true
    ];
}
