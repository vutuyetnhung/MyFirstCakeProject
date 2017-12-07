<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
use Cake\Utility\Security;
/**
 * UserTbl Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\UserTbl get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserTbl newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserTbl[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserTbl|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserTbl patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserTbl[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserTbl findOrCreate($search, callable $callback = null, $options = [])
 */
class UserTblTable extends Table
{
    const DELETE_FLAG_NONE = 0;
    const DELETE_FLAG_ONE = 1;

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        // $this->setTable('user_tbl');
        // $this->setDisplayField('user_id');
        // $this->setPrimaryKey('user_id');

        // $this->belongsTo('Users', [
        //     'foreignKey' => 'user_id',
        //     'joinType' => 'INNER'
        // ]);
        $this->addBehavior('Timestamp');
        // $this->table('user_tbl');
        $this->setTable('user_tbl');
        $this->hasMany('ManageOvertimes',
               array(
                'foreignKey'=>'user_id',
                'bindingKey' => 'user_id',
                'className'=>'ManageOvertimes',
            
                )
        );

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'className' => 'Roles',
            'joinType' => 'INNER',
        ]);
        
        $this->belongsToMany('Projects', [
            'targetForeignKey' => 'project_id',
            'joinTable' => 'member_project_tbl',
            'foreignKey' => 'project_id',
        ]);
         $this->hasMany('Members')
         ->setForeignKey('user_id')
            ->setDependent(true);
         $this->hasMany('Overtimes')
            ->setForeignKey('user_id')
            ->setDependent(true);   
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator->notEmpty('username','Vui lòng nhập tên')
                ->add('username', [
                'length' => [
                    'rule' => ['minLength', 3],
                    'message' => 'Tên cần có ít nhất 3 ký tự',
                ]
            ]);
        $validator->notEmpty('password','Vui lòng nhập mật khẩu');
        $validator->notEmpty('personal_email','Vui lòng nhập email')
                    ->add('personal_email',[
                        'validFormat' => [
                            'rule' => 'email',
                            'message' => 'Vui lòng nhập đúng định dạng email'
                        ]
                    ]);
        // $validator->notEmpty('password','Nhập password vào nhé');
        // $validator->
        // $validator
        //     ->scalar('username')
        //     ->notEmpty('username','Vui lòng nhập Tên');


        // $validator
        //     ->scalar('password')
        //     ->notEmpty('password','Vui lòng nhập Mật khẩu');

        // $validator
        //     ->scalar('fullname')
        //     ->notEmpty('fullname');

        // $validator
        //     ->scalar('nickname')
        //     ->allowEmpty('nickname');

        // $validator
        //     ->scalar('slogan')
        //     ->allowEmpty('slogan');

        // $validator
        //     ->scalar('personal_email')
        //     ->notEmpty('personal_email','Vui lòng nhập email của bạn');

        // $validator
        //     ->scalar('company_email')
        //     ->notEmpty('company_email');

        // $validator
        //     ->scalar('employee_code')
        //     ->notEmpty('employee_code');

        // $validator
        //     ->scalar('identity_no')
        //     ->notEmpty('identity_no');

        // $validator
        //     ->integer('gender')
        //     ->notEmpty('gender');

        // $validator
        //     ->date('date_of_birth')
        //     ->allowEmpty('date_of_birth');

        // $validator
        //     ->scalar('address')
        //     ->notEmpty('address');

        // $validator
        //     ->date('trial_date')
        //     ->allowEmpty('trial_date');

        // $validator
        //     ->date('official_date')
        //     ->allowEmpty('official_date');

        // $validator
        //     ->dateTime('create_time')
        //     ->allowEmpty('create_time');

        // $validator
        //     ->dateTime('update_time')
        //     ->allowEmpty('update_time');

        // $validator
        //     ->integer('delete_status')
        //     ->notEmpty('delete_status');

        return $validator;
    }


    public function showUser(){

        $result = $this->find('all')->select(['user_id','username', 'fullname', 'slogan', 'personal_email'])->where(['delete_status' => '0'])->order(['create_time' => 'DESC'])->toArray();
        // $result = "chào model";
         $userTable = TableRegistry::get('UserTbl');
         $roleTable = TableRegistry::get('RoleMst');
         $groupTable = TableRegistry::get('GroupTbl');
         $role = $roleTable->find('list', ['keyField' => 'role_id', 'valueField' => 'value'])->toArray();
         $group = $groupTable->find('list', ['keyField' => 'group_id', 'valueField' => 'name'])->toArray();
         $result = $this->find('all')
            ->select([
            'UserTbl.user_id',
            'UserTbl.personal_email',
            'UserTbl.fullname',
            'UserTbl.slogan',
            'UserRoleTbl.role_id',
            'UserGroupTbl.group_id'
        ])
        ->where(['UserTbl.delete_status' => '0'])
        ->join([
            [
            'table' => 'user_group_tbl',
            'alias' => 'UserGroupTbl',
            'type' => 'LEFT',
            'conditions' => 'UserTbl.user_id= UserGroupTbl.user_id' ,
            ],
            [
            'table' => 'user_role_tbl',
            'alias' => 'UserRoleTbl',
            'type' => 'LEFT',
            'conditions' => 'UserRoleTbl.user_id = UserTbl.user_id',
            ]
        
        ])->order(['UserTbl.create_time' => 'DESC'])    
        ->toArray();
        return $result;
    }

    // public function checkUsername($data){
    //     $partten = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/";
    //     if () {
    //         # code...
    //     }
    // }

    public function addUser($data){
        $user = $this->newEntity();

        $user->username = isset($data['username']) ? $data['username'] : null;
        $password = isset($data['password']) ? $data['password'] : null;
        $hasher = new DefaultPasswordHasher();
        $resultll = $hasher->hash($password);
        $user->password = $resultll;

       

        
        $user->fullname = isset($data['fullname']) ? $data['fullname'] : null;
        $user->nickname = isset($data['nickname']) ? $data['nickname'] : null;
        $user->slogan = isset($data['slogan']) ? $data['slogan'] : null;
        $user->personal_email = isset($data['personal_email']) ? $data['personal_email'] : null;
        // $this->save($user);
         $userValidate = $this->patchEntity($user,$data);
        return $userValidate;
        
    }

    public function findUserNewest(){
        $result = $this->find('all')->limit(1)->order(['create_time' => 'DESC'])->toArray();
        return $result;
    }

    public function editUser($data,$user_id_current){
        $user = [];
        $user['nickname'] = isset($data['nickname']) ? $data['nickname'] : null;
        $user['fullname'] = isset($data['fullname']) ? $data['fullname'] : null;
        $user['slogan'] = isset($data['slogan']) ? $data['slogan'] : null;
        $user['personal_email'] = isset($data['personal_email']) ? $data['personal_email'] : null;
        $query = $this->query();
        $query->update()
                            ->set(['fullname' => $user['fullname']])
                            ->set(['nickname' => $user['nickname']])
                            ->set(['slogan' => $user['slogan']])
                            ->set(['personal_email' => $user['personal_email']])
                            ->where(['user_id' => $user_id_current ])
                            ->execute();
    }

    public function deleteUser($id){
        $query = $this->query();
                $query->update()
                    ->set(['delete_status' => self::DELETE_FLAG_ONE])
                    ->where(['user_id' => $id])
                    ->execute();
    }

}
