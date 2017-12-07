<?php 
	/**
	* 
	*/
	namespace App\Controller\Component;

	use Cake\Controller\Component;
	class DataComponent extends Component
	{
		
  
    public function match(){
     
      	$a = 5;
     	$b = 8;
     	return $a+$b;

    }
     public function match2(){
     
     	echo "    cái hihi222";
     	
    }
		
	}
	
?>