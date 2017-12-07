<?php
	echo $this->Form->create();
	echo $this->Html->para(null, 'Hello World.');//<p>Hello World.</p>
	echo $this->Html->div('error', 'Please enter your credit card number.');//<div class="error">Please enter your credit card number.</div>
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