<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TreatmentRecord Entity
 *
 * @property string $id
 * @property string $cow_id
 * @property \Cake\I18n\FrozenDate $treatment_date
 * @property string $disease
 * @property string $drug_used
 * @property string $conservator
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $updated
 * @property string $updatedby
 *
 * @property \App\Model\Entity\Cow $cow
 */
class TreatmentRecord extends Entity
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
        'treatment_date' => true,
        'disease' => true,
        'drug_used' => true,
        'conservator' => true,
        'description' => true,
        'created' => true,
        'createdby' => true,
        'updated' => true,
        'updatedby' => true,
        'cow' => true
    ];
}
