<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MovementRecord Entity
 *
 * @property string $id
 * @property string $cow_id
 * @property string $departure
 * @property string $destination
 * @property \Cake\I18n\FrozenDate $movement_date
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $updated
 * @property string $updatedby
 *
 * @property \App\Model\Entity\Cow $cow
 */
class MovementRecord extends Entity
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
        'cow_id' => true,
        'departure' => true,
        'destination' => true,
        'movement_date' => true,
        'description' => true,
        'created' => true,
        'createdby' => true,
        'updated' => true,
        'updatedby' => true,
        'cow' => true
    ];
}
