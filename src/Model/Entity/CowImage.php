<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CowImage Entity
 *
 * @property string $id
 * @property string $cow_id
 * @property string $image_id
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 *
 * @property \App\Model\Entity\Cow $cow
 * @property \App\Model\Entity\Image $image
 */
class CowImage extends Entity
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
        'image_id' => true,
        'created' => true,
        'createdby' => true,
        'cow' => true,
        'image' => true
    ];
}
