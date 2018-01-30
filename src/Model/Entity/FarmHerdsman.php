<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FarmHerdsman Entity
 *
 * @property string $id
 * @property string $farm_id
 * @property string $herdsman_id
 * @property string $description
 * @property int $seq
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $updated
 * @property string $updatedby
 *
 * @property \App\Model\Entity\Farm $farm
 * @property \App\Model\Entity\Herdsman $herdsman
 */
class FarmHerdsman extends Entity
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
        'farm_id' => true,
        'herdsman_id' => true,
        'description' => true,
        'seq' => true,
        'created' => true,
        'createdby' => true,
        'updated' => true,
        'updatedby' => true,
        'farm' => true,
        'herdsman' => true
    ];
}
