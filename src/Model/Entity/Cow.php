<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cow Entity
 *
 * @property string $id
 * @property string $code
 * @property string $grade
 * @property \Cake\I18n\FrozenDate $birthday
 * @property string $gender
 * @property string $isbreeder
 * @property string $cow_breed_id
 * @property string $breeding
 * @property string $father_code
 * @property string $mother_code
 * @property string $origins
 * @property \Cake\I18n\FrozenDate $import_date
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $updated
 * @property string $updatedby
 *
 * @property \App\Model\Entity\CowBreed $cow_breed
 * @property \App\Model\Entity\CowImage[] $cow_images
 * @property \App\Model\Entity\MovementRecord[] $movement_records
 * @property \App\Model\Entity\TreatmentRecord[] $treatment_records
 */
class Cow extends Entity
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
        'code' => true,
        'grade' => true,
        'birthday' => true,
        'gender' => true,
        'isbreeder' => true,
        'cow_breed_id' => true,
        'breeding' => true,
        'father_code' => true,
        'mother_code' => true,
        'origins' => true,
        'import_date' => true,
        'description' => true,
        'created' => true,
        'createdby' => true,
        'updated' => true,
        'updatedby' => true,
        'cow_breed' => true,
        'cow_images' => true,
        'movement_records' => true,
        'treatment_records' => true
    ];
}
