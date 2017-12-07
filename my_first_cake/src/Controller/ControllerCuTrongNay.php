<?php
	echo $this->Form->create();

	echo $this->Form->text('username', ['class' => 'users']);//input vs name = username, thuoc tinh class = users hay tg dg <input name="username" type="text" class="users"> trong html

	echo $this->Form->password('password');//tao input vs na

	echo $this->Form->hidden('id');//tuong duong <input name="id" type="hidden" />

	echo $this->Form->textarea('notes');// tuong duong <textarea name="notes"></textarea>
	//	echo $this->Form hoac cai gi day ->cac loai input('name trong html',['thuoc tinh'='gia tri'],[].....	)

	echo $this->Form->select(
    'field',
    [1, 2, 3, 4, 5],
    ['empty' => '(choose one)']
	);//tuong duong <select name="field">
	//     <option value="">(choose one)</option>
	//     <option value="0">1</option>
	//     <option value="1">2</option>
	//     <option value="2">3</option>
	//     <option value="3">4</option>
	//     <option value="4">5</option>
	// </select>
	echo $this->Form->select('field', [
    'Value 1' => 'Label 1',
    'Value 2' => 'Label 2',
    'Value 3' => 'Label 3'
	]);// <select name="field">
	//     <option value="Value 1">Label 1</option>
	//     <option value="Value 2">Label 2</option>
	//     <option value="Value 3">Label 3</option>
	// </select>

	echo $this->Form->checkbox('published', ['hiddenField' => false]);//tuong duong <input type="checkbox" name="published" value="1"> khi k muon tao hide nhu o duoi
	echo  $ this -> Form -> checkbox ( 'done' );//tao ra 1 cai hide co gia tri 0 < input  type = "hidden"  name = "done"  value = "0" >  and < input  type = "checkbox"  name = "done"  value = "1" >

	$this->Form->radio('gender', ['Masculine','Feminine','Neuter']);// output
// 	<input name="gender" value="" type="hidden">
// <label for="gender-0">
//     <input name="gender" value="0" id="gender-0" type="radio">
//     Masculine
// </label>
// <label for="gender-1">
//     <input name="gender" value="1" id="gender-1" type="radio">
//     Feminine
// </label>
// <label for="gender-2">
//     <input name="gender" value="2" id="gender-2" type="radio">
//     Neuter
// </label>

		$options = [
		    'Group 1' => [
		        'Value 1' => 'Label 1',
		        'Value 2' => 'Label 2'
		    ],
		    'Group 2' => [
		        'Value 3' => 'Label 3'
		    ]
		];
		echo $this->Form->select('field', $options);
		// 	<select name="field">
		//     <optgroup label="Group 1">
		//         <option value="Value 1">Label 1</option>
		//         <option value="Value 2">Label 2</option>
		//     </optgroup>
		//     <optgroup label="Group 2">
		//         <option value="Value 3">Label 3</option>
		//     </optgroup>
		// </select>

	echo $this->Form->end();
?>
<?php

	/**
	* 
	*/
	namespace App\Controller;
	use Cake\ORM\TableRegistry;
	use Cake\Controller\Controller;
	use Cake\ORM\Table;
	use Cake\ORM\Query;
	use Cake\ORM\Entity;
	use Cake\Validation\Validator;
    use Cake\Event\Event;
    use App\Controller\AppController;
    use Cake\Auth\FormAuthenticate;
    use Cake\Auth\DefaultPasswordHasher;
    use Cake\Utility\Security;



	class UsersController extends AppController
	{
		// $user_id_get = 'something';
		
		  public function initialize()
    {
        parent::initialize();
            $userTable = TableRegistry::get('UserTbl');
        
       $this->loadModel('UserTbl');
       // $usermodel = array('UserTbl');
       
        // $this->loadComponent('Data');//goi DataComponent
        //   $components = array('Data');//k dc để public 
    }
    	// public $helpers = array('First');//goi Firsthelper
		// public $name = "Users";
    	public function login(){
             $this->viewBuilder()->layout('login');
    		$userTable = TableRegistry::get('UserTbl');
    		$usertable = $userTable->newEntity();
    		if ($this->request->is('post')) {
                $data = $this->request->data;
                $user = [];
                $user_id_get = isset($data['username']) ? $data['username'] : null;
                $user['username'] = isset($data['username']) ? $data['username'] : null;
                $user['password'] = isset($data['password']) ? $data['password'] : null;

                $user = $userTable->patchEntity($usertable,$user);
                $message =[];
                foreach ($user->errors() as $value) {
                    foreach ($value as $value1) {
                        $message[] = $value1;
            
                    }
                }
                if (!empty($message)) {
                    $this->Flash->error($message);
                } else {
                    $user = $this->Auth->identify();
                    $this->Auth->setUser($user);
                    return $this->redirect('/Users/listUser');
                }
    		}

    		   
    		// $validator = new Validator();
			//debug($userTable->find()->where(['user_id' => 'aaaaa']));
			// print_r($this->Data->match());
			// $this->Data->match();//chay ham match trong DataComponent
			// $this->render("test1");//chạy hàm helper1 trong FirstHelper ---- bỏ dòng này đi thì nó sẽ in ra kết quả của hàm match trong DataComponent
			//$this->helpers->helper1();
			 // $data = $this->Data->match2();//Sử dụng function randd(6),randdom 6 số k cần gán do trong hàm là lệnh echo rồi
      		// $this->set("data",$data);
			 //cái render nào cuối thì content nó sẽ là của cái đấy

	      }
        public function logout(){

            $this->Auth->logout();
            return $this->redirect('/Users/login');

	      // public $components = array('Data'); goi ở trong initialize
        }
		public function test2(){
			$data = $this->Data->match();//Sử dụng function randd(6),randdom 6 số
       		$this->set("data",$data);
		}

		
		public function listUser(){
              $roleModel = $this->loadModel('RoleMst');
                $role = $roleModel->showRole();
                $groupModel = $this->loadModel('GroupTbl');
                $group = $groupModel->showGroup();
                $data = $this->UserTbl->showUser();
                 $this->set('role', $role);
                 $this->set('group', $group);
                $this->set("data",$data);
		}

		function add(){
             if ($this->request->is('post')) {
                    $data = $this->request->data;
                     $this->UserTbl->addUser($data);

                     $userGroupTbl = $this->loadModel('UserGroupTbl');
                     $userGroupTbl->addUserGroup($data);
                     $userRoleTbl = $this->loadModel('UserRoleTbl');
                     $userRoleTbl->addUserRole($data);
                    return $this->redirect('/Users/listUser');

                }
               

       //      $groupTable = TableRegistry::get('GroupTbl');  
       //      $userTable = TableRegistry::get('UserTbl');
       //      $userGrouptbl = TableRegistry::get('UserGroupTbl');
       //      $userRoletbl = TableRegistry::get('UserRoleTbl');

       //      $user = $userTable->newEntity();
       //      $usergr = $userGrouptbl->newEntity();
       //      $userro = $userRoletbl->newEntity();
            
		     // if ($this->request->is('post')) {
       //          $data = $this->request->data;
       //          $user->username = isset($data['username']) ? $data['username'] : null;

       //          $password = isset($data['password']) ? $data['password'] : null;
       //          $hasher = new DefaultPasswordHasher();
       //          $resultll = $hasher->hash($password);

       //          $user->password = $resultll;
       //          $user->fullname = isset($data['fullname']) ? $data['fullname'] : null;
       //          $user->nickname = isset($data['nickname']) ? $data['nickname'] : null;
       //          $user->slogan = isset($data['slogan']) ? $data['slogan'] : null;
       //          $user->personal_email = isset($data['personal_email']) ? $data['personal_email'] : null;
       //          $usergr->group_id = isset($data['selgroup']) ? $data['selgroup'] : null;
       //          $userro->role_id = isset($data['selrole']) ? $data['selrole'] : null;

       //          if ($userTable->save($user)) {
       //              $result1 = $userTable->find('all')->limit(1)->order(['create_time' => 'DESC'])->toArray();
       //              $usergr->user_id = $result1['0']['user_id'];
       //              $userro->user_id = $result1['0']['user_id'];
       //              $userGrouptbl->save($usergr);

       //              $userRoletbl->save($userro);
       //              return $this->redirect('/Users/listUser');
       //          }
       //       }
 			}
            public function edit(){
                 $userTable = TableRegistry::get('UserTbl');
                $u = $this->Auth->user();
                $user_id_current = $u['user_id'];
                $result = $userTable->find()->select(['username', 'nickname','fullname', 'slogan','personal_email'])
                ->where(['user_id' => $user_id_current])->toArray();
                $this->set("result",$result);
                if ($this->request->is('post')) {
                    $data = $this->request->data;
                    $user = [];
                    $user['nickname'] = isset($data['nickname']) ? $data['nickname'] : null;
                    $user['fullname'] = isset($data['fullname']) ? $data['fullname'] : null;
                    $user['slogan'] = isset($data['slogan']) ? $data['slogan'] : null;
                    $user['personal_email'] = isset($data['personal_email']) ? $data['personal_email'] : null;
                    $query = $userTable->query();
                    $query->update()
                            ->set(['fullname' => $user['fullname']])
                            ->set(['nickname' => $user['nickname']])
                            ->set(['slogan' => $user['slogan']])
                            ->set(['personal_email' => $user['personal_email']])
                            ->where(['user_id' => $user_id_current ])
                            ->execute();
                    return $this->redirect('/Users/edit');
                }
                
            }

            public function showUserModel(){
                //  if ($this->request->is('post')) {
                //     $data = $this->request->data;
                //      $this->UserTbl->addUser($data);

                //      $userGroupTbl = $this->loadModel('UserGroupTbl');
                //      $userGroupTbl->addUserGroup($data);
                //      $userRoleTbl = $this->loadModel('UserRoleTbl');
                //      $userRoleTbl->addUserRole($data);
                // echo "thành công dc user";die;

                // }
               
            }
	}
?>