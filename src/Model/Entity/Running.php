<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Running Entity
 *
 * @property int $id
 * @property string $running_code
 * @property int $running_no
 * @property \Cake\I18n\FrozenDate $runnubg_date
 * @property string $running_type
 */
class Running extends Entity
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
        'running_code' => true,
        'running_no' => true,
        'runnubg_date' => true,
        'running_type' => true
    ];
}
