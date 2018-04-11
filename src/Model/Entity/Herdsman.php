<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Herdsman Entity
 *
 * @property string $id
 * @property string $code
 * @property string $aac_code
 * @property string $amc_code
 * @property int $grade
 * @property string $title
 * @property string $firstname
 * @property string $lastname
 * @property string $idcard
 * @property \Cake\I18n\FrozenDate $birthday
 * @property string $account_number1
 * @property string $account_number2
 * @property \Cake\I18n\FrozenDate $registerdate
 * @property string $isactive
 * @property string $address_id
 * @property string $image_id
 * @property string $mobile
 * @property string $email
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $updated
 * @property string $updatedby
 * @property string $isapproved
 * @property string $request_note
 * @property string $approvedby
 *
 * @property \App\Model\Entity\Address $address
 * @property \App\Model\Entity\Image $image
 * @property \App\Model\Entity\FarmHerdsman[] $farm_herdsmans
 */
class Herdsman extends Entity
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
        'aac_code' => true,
        'amc_code' => true,
        'grade' => true,
        'title' => true,
        'firstname' => true,
        'lastname' => true,
        'idcard' => true,
        'birthday' => true,
        'account_number1' => true,
        'account_number2' => true,
        'registerdate' => true,
        'isactive' => true,
        'address_id' => true,
        'image_id' => true,
        'mobile' => true,
        'email' => true,
        'description' => true,
        'created' => true,
        'createdby' => true,
        'updated' => true,
        'updatedby' => true,
        'isapproved' => true,
        'request_note' => true,
        'approvedby' => true,
        'address' => true,
        'image' => true,
        'farm_herdsmans' => true
    ];
}
