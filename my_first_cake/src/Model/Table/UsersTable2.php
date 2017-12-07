<?php 
	namespace App\Model\Table;
	use Cake\ORM\Table;

	use Cake\ORM\Query;
	use Cake\Validation\Validator;
	/**
	*  
	*/
	class UsersTable2	 extends Table
	{
		public function initialize(array $config)
    	{
        	$this->setTable('user_tbl');

    	}
    	function valid2(){

		   		 $this->validate = array(
		       "name" => array(
		           "dk1" => array(
		               "rule" => "notBlank",
		               "message" => "Name không rỗng !",
		            ),
		            "dk2" => array(
		                "rule"=> array('lengthBetween', 6, 10),
		                "message" => "Name trong khoảng 6 đến 10 kí tự"
		            ), 
		 
		         ),
		         "email" => array(
		             "dk1" => array(
		                  "rule" => "notBlank",
		                  "message" => "Email không rỗng !",
		              ),
		              "dk2" => array(
		                  'rule' => array('email', true),
		                  "message" =>"Vui lòng nhập đúng định dạng",
		               ),
		          ),
		          "website" => array(
		              "dk1" => array(
		                  "rule" => "notBlank",
		                  "message" => "Website không rỗng !",
		              ),
		              "dk2" =>array(
		                  "rule" =>"url",
		                  "message" => "Vui lòng nhập đúng định dạng website",
		              )
		          ),
		 );
		 if($this->validates($this->validate))
		 return TRUE;
		 else
		 return FALSE;
		 }

		 function validate1(Validator $validator){
		 	//đơn giản 'tên trường dl' => 'tên rule được định nghĩa sẵn'
			 	public $validate = array(
		            'login' => 'alphaNumeric', // có thể là kí tự alphabe hay số
		            'email' => 'email',  // cần phải có format của email
		            'born'  => 'date' // dữ liệu ngày tháng
	        	);
		 	//
			 	public $validate = array(
		           'username' => array(
		           		'rule' => 'alphaNumeric',//username chỉ được nhập kí tự alphabe và số

		           ) 
		        );
		 	$validator->notEmpty('username','Username is required');
		 	$validator = array(

		 		username => array(
		 			'required' => true,
		 			'allowEmpty' => false,
		 			'on' => 'create',
		 			'message'    => 'Message lỗi ở đây'
		 		)
		 	);
		 	//trong cake 3: 
		 	//đơn giản: $validator->tênrule('ten trường','message khi có lỗi validate');

    		$validator->notEmpty('password','Password is required');
    		$validator->add('username', 'valid-email', ['rule' => 'email']);
    		$validator->add('password', 'length', ['rule' => ['lengthBetween', 8, 100]]);

			    $validator->add('body', [
					        'minLength' => [//trường minlength luật độ dài tối thiểu là 10,nếu có lỗi hiện message và k cần thực thi tiếp validate tiếp  theo 
					            'rule' => ['minLength', 10],
					            'last' => true,
					            'message' => 'Comments must have a substantial body.'
					        ],
					        'maxLength' => [//
					            'rule' => ['maxLength', 250],
					            'message' => 'Comments cannot be too long.'
					        ]
					    ]);
    		return $validator;
		 }
	}
?>