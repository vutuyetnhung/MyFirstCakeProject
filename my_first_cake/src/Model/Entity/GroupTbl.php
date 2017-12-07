<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GroupTbl Entity
 *
 * @property string $group_id
 * @property string $name
 * @property string $description
 * @property string $slogan
 * @property \Cake\I18n\FrozenTime $create_time
 * @property \Cake\I18n\FrozenTime $update_time
 * @property int $delete_status
 *
 * @property \App\Model\Entity\Group $group
 */
class GroupTbl extends Entity
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
        'description' => true,
        'slogan' => true,
        'create_time' => true,
        'update_time' => true,
        'delete_status' => true,
        'group' => true
    ];
}
