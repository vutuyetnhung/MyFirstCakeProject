<?php
if (!isset($params['escape']) || $params['escape'] !== false ) {
	if (!is_array($message)) {
		 $message = h($message);
	} else {
		?>
		<div class="err-box">
			 <div class="message error" style="color: red;margin-left: 20px;" onclick="this.classList.add('hidden');">
			 		<?php
			 			foreach ($message as $key => $value) {
			 				echo $value;
			 				echo '<br>';
			 			}
			 		?>
			 	</div>
			</div>

				<?php } 
   
}?>

