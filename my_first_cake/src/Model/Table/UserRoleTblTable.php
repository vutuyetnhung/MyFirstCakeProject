<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * UserRoleTbl Model
 *
 * @property \App\Model\Table\UserRolesTable|\Cake\ORM\Association\BelongsTo $UserRoles
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 *
 * @method \App\Model\Entity\UserRoleTbl get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserRoleTbl newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserRoleTbl[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserRoleTbl|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserRoleTbl patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserRoleTbl[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserRoleTbl findOrCreate($search, callable $callback = null, $options = [])
 */
class UserRoleTblTable extends Table
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

        $this->setTable('user_role_tbl');
        $this->setDisplayField('user_role_id');
        $this->setPrimaryKey('user_role_id');

        $this->belongsTo('UserRoles', [
            'foreignKey' => 'user_role_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
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

    public function addUserRole($data){
         $userro = $this->newEntity();
        $userro->role_id = isset($data['selrole']) ? $data['selrole'] : null;
        $userTable = TableRegistry::get('UserTbl');
        $result1 = $userTable->findUserNewest();
        $userro->user_id = $result1['0']['user_id'];
        $this->save($userro);
    }
    public function deleteUserRole($id){
        $query = $this->query();
        $query->update()
            ->set(['delete_status' => '1'])
            ->where(['user_id' => $id])
            ->execute();
    }
}
