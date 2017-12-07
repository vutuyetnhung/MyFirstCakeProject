<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * UserGroupTbl Model
 *
 * @property \App\Model\Table\UserGroupsTable|\Cake\ORM\Association\BelongsTo $UserGroups
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\GroupsTable|\Cake\ORM\Association\BelongsTo $Groups
 *
 * @method \App\Model\Entity\UserGroupTbl get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserGroupTbl newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserGroupTbl[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserGroupTbl|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserGroupTbl patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserGroupTbl[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserGroupTbl findOrCreate($search, callable $callback = null, $options = [])
 */
class UserGroupTblTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('user_group_tbl');
        $this->setDisplayField('user_group_id');
        $this->setPrimaryKey('user_group_id');

        $this->belongsTo('UserGroups', [
            'foreignKey' => 'user_group_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('is_leader')
            ->requirePresence('is_leader', 'create')
            ->notEmpty('is_leader');

        $validator
            ->dateTime('create_time')
            ->requirePresence('create_time', 'create')
            ->notEmpty('create_time');

        $validator
            ->dateTime('update_time')
            ->requirePresence('update_time', 'create')
            ->notEmpty('update_time');

        $validator
            ->integer('delete_status')
            ->requirePresence('delete_status', 'create')
            ->notEmpty('delete_status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */

    public function addUserGroup($data){
        $usergr = $this->newEntity();
        $usergr->group_id = isset($data['selgroup']) ? $data['selgroup'] : null;
        $userTable = TableRegistry::get('UserTbl');
        $result1 = $userTable->findUserNewest();
        $usergr->user_id = $result1['0']['user_id'];
        $this->save($usergr);
    }

    public function deleteUserGroup($id){
        $query = $this->query();
        $query->update()
            ->set(['delete_status' => '1'])
            ->where(['user_id' => $id])
            ->execute();
    }
}
