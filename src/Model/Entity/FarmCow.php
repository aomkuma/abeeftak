<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FarmCow Entity
 *
 * @property string $id
 * @property string $farm_id
 * @property string $cow_id
 * @property int $seq
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $updated
 * @property string $updatedby
 * @property string $isactive
 * @property \Cake\I18n\FrozenDate $moved_in_date
 * @property \Cake\I18n\FrozenDate $moved_out_date
 *
 * @property \App\Model\Entity\Farm $farm
 * @property \App\Model\Entity\Cow $cow
 */
class FarmCow extends Entity
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
        'cow_id' => true,
        'seq' => true,
        'description' => true,
        'created' => true,
        'createdby' => true,
        'updated' => true,
        'updatedby' => true,
        'isactive' => true,
        'moved_in_date' => true,
        'moved_out_date' => true,
        'farm' => true,
        'cow' => true
    ];
}
