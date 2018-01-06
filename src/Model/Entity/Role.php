<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Role Entity
 *
 * @property string $id
 * @property string $name
 * @property string $isactive
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property string $createdby
 * @property \Cake\I18n\FrozenTime $updated
 * @property string $updatedby
 *
 * @property \App\Model\Entity\RoleAccess[] $role_accesses
 * @property \App\Model\Entity\User[] $users
 */
class Role extends Entity
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
        'isactive' => true,
        'description' => true,
        'created' => true,
        'createdby' => true,
        'updated' => true,
        'updatedby' => true,
        'role_accesses' => true,
        'users' => true
    ];
}
