<?php

	/**
	* 
	*/
	namespace App\Controller;

	use Cake\Controller\Controller;
	class PostsController extends AppController
	{
		var $name = "posts";
		function __construct(argument)
		{
			..
		}
		
		public function index(){

		}

		public function login() {

		}
		public function initialize(){
		    parent::initialize();
		    // Set the layout
		    $this->viewBuilder()->layout('frontend');
		}
		}
?>