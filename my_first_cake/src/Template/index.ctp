<?php 
	
    echo $this->Form->create('FirstForm');//tao form
    echo  $ this -> Form -> textarea ( 'comment' ,  [ 'rows'  =>  '5' ,  'cols'  =>  '5' ]);//tao textarea name=comment vs row va col
    //tao radio
    echo $this->Form->input('field',$array1 = array('before0' => '--before--',
    	'after' =>'betwenn';
    	'between' =>'--between---',
   		'separator' => '--separator--',
    	'options' => array('1', '2'),
    	'type' => 'radio';
	
		    echo $this->Form->create('FirstForm');
		    echo $this->Form->input('firstname', array('label' => 'Enter your first name:'));
		    echo $this->Form->input('email', array('label' => 'Enter your email address:'));
		    echo $this->Form->input('password', array('label' => 'Enter your password:'));
		    echo $this->Form->end('Save');
	$options = array(1 => 'ONE', 'TWO', 'THREE');$selected = array(1, 3);
echo $form->input('Model.name', array('multiple' => 'checkbox', 'options' => $options, 'selected' => $selected));
?>	
    	 ););
    echo $this->Form->input('firstname', array('label' => 'Enter your first name:'));
    echo $this->Form->input('email', array('label' => 'Enter your email address:'));
    echo $this->Form->input('password', array('label' => 'Enter your password:'));
    echo $this->Form->input('checkbox', array(
                                  'type'=>'checkbox', 
                                  'format' => array('before', 'input', 'between', 'label', 'after', 'error' ) 
  	) );
    echo $this->Form->end('Save');

?>