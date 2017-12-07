<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserTbl Entity
 *
 * @property string $user_id
 * @property string $username
 * @property string $password
 * @property string $fullname
 * @property string $nickname
 * @property string $slogan
 * @property string $personal_email
 * @property string $company_email
 * @property string $employee_code
 * @property string $identity_no
 * @property int $gender
 * @property \Cake\I18n\FrozenDate $date_of_birth
 * @property string $address
 * @property \Cake\I18n\FrozenDate $trial_date
 * @property \Cake\I18n\FrozenDate $official_date
 * @property \Cake\I18n\FrozenTime $create_time
 * @property \Cake\I18n\FrozenTime $update_time
 * @property int $delete_status
 *
 * @property \App\Model\Entity\User $user
 */
class UserTbl extends Entity
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
    ];
}
