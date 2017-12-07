<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserGroupTbl Entity
 *
 * @property string $user_group_id
 * @property string $user_id
 * @property string $group_id
 * @property int $is_leader
 * @property \Cake\I18n\FrozenTime $create_time
 * @property \Cake\I18n\FrozenTime $update_time
 * @property int $delete_status
 *
 * @property \App\Model\Entity\UserGroup $user_group
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Group $group
 */
class UserGroupTbl extends Entity
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
        'group_id' => true,
        'is_leader' => true,
        'create_time' => true,
        'update_time' => true,
        'delete_status' => true,
        'user_group' => true,
        'user' => true,
        'group' => true
    ];
}
