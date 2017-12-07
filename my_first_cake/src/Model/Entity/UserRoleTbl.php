<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserRoleTbl Entity
 *
 * @property string $user_role_id
 * @property string $user_id
 * @property string $role_id
 * @property \Cake\I18n\FrozenTime $create_time
 * @property \Cake\I18n\FrozenTime $update_time
 * @property int $delete_status
 *
 * @property \App\Model\Entity\UserRole $user_role
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Role $role
 */
class UserRoleTbl extends Entity
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
        'user_id' => true,
        'role_id' => true,
        'create_time' => true,
        'update_time' => true,
        'delete_status' => true,
        'user_role' => true,
        'user' => true,
        'role' => true
    ];
}
