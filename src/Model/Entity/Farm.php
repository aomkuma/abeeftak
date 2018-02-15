<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Farm Entity
 *
 * @property string $id
 * @property string $name
 * @property string $level
 * @property string $type
 * @property string $address_id
 * @property string $description
 * @property string $location_image
 * @property float $latitude
 * @property float $longitude
 * @property string $hasstable
 * @property int $total_stable
 * @property int $total_cow_capacity
 * @property string $hasmeadow
 * @property int $total_meadow
 * @property string $total_space
 * @property string $grass_species
 * @property string $water_body
 * @property string $dung_destroy
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $updated
 * @property string $updatedby
 *
 * @property \App\Model\Entity\Address $address
 * @property \App\Model\Entity\FarmCow[] $farm_cows
 * @property \App\Model\Entity\FarmHerdsman[] $farm_herdsmans
 */
class Farm extends Entity
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
        'name' => true,
        'level' => true,
        'type' => true,
        'address_id' => true,
        'description' => true,
        'location_image' => true,
        'latitude' => true,
        'longitude' => true,
        'hasstable' => true,
        'total_stable' => true,
        'total_cow_capacity' => true,
        'hasmeadow' => true,
        'total_meadow' => true,
        'total_space' => true,
        'grass_species' => true,
        'water_body' => true,
        'dung_destroy' => true,
        'created' => true,
        'createdby' => true,
        'updated' => true,
        'updatedby' => true,
        'address' => true,
        'farm_cows' => true,
        'farm_herdsmans' => true
    ];
}
