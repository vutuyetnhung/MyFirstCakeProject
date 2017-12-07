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
		
		  public function initialize()
    {
        parent::initialize();
        $userTable = TableRegistry::get('UserTbl');
        $this->loadComponent('Paginator');
       $this->loadModel('UserTbl');
       
    }
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
	      }

        public function logout(){
            $this->Auth->logout();
            return $this->redirect('/Users/login');

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
                // $data = $this->UserTbl->showUser();
                 $this->set('role', $role);
                 $this->set('group', $group);
             $this->set('data', $this->Paginator->paginate($this->UserTbl, [
        'limit' => 15,
        'order' => [
                        'UserTbl.create_time' => 'desc'
                    ]
    ]));
                // $this->set("data",$data);
		}

		public function add(){
             if ($this->request->is('post')) {
                    $data = $this->request->data;
                     $message =[];
                foreach ($this->UserTbl->addUser($data)->errors() as $value) {
                    foreach ($value as $value1) {
                        $message[] = $value1;
                    }
                }
                // print_r($message);die;
                if (!empty($message)) {
                    $this->Flash->error($message);
                    // echo "In ra cái dòng này";
                }
                // echo "Da valiadte";die;
                 // $this->UserTbl->addUser($data);

                 // $userGroupTbl = $this->loadModel('UserGroupTbl');
                 // $userGroupTbl->addUserGroup($data);
                 // $userRoleTbl = $this->loadModel('UserRoleTbl');
                 // $userRoleTbl->addUserRole($data);
                // return $this->redirect(URL_LIST_USER);

                }
 		}

       public function edit(){
                $u = $this->Auth->user();
                $user_id_current = $u['user_id'];
                $result = $this->UserTbl->find()->select(['username', 'nickname','fullname', 'slogan','personal_email'])
                ->where(['user_id' => $user_id_current])->toArray();
                 $this->set("result",$result);
                 if ($this->request->is('post')) {
                    $data = $this->request->data;
                    $this->UserTbl->editUser($data,$user_id_current);
                   return $this->redirect('/Users/edit');
            }
        }

            public function showUserModel(){
              
            }

            public function delete($id){
                $this->UserTbl->deleteUser($id);
                $userGroupModel = $this->loadModel('UserGroupTbl');
                $userGroupModel->deleteUserGroup($id);
                $userRoleModel = $this->loadModel('UserRoleTbl');
                $userRoleModel->deleteUserRole($id);

                return $this->redirect('/Users/listUser');
            }

            public function paginateUser(){
                 $paginate = [
                    'limit' => 20,
                    'order' => [
                        'UserTbl.create_time' => 'desc'
                    ]
                 ];

            }
	}
?>