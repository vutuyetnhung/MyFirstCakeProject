<form action="edit" method="POST">
    		 <p><strong>Username:</strong></p>
      <input type="text" name="lname" disabled="" value="<?php echo $result['0']['username']; ?><?php echo $result['username']; ?>" style="text-align: center;    background: antiquewhite;"><br>
      <p><strong>Nickname</strong></p>
      <input type="text" name="nickname" value="<?php echo $result['0']['nickname']; ?>">
      <p><strong>Email</strong></p>
      <input type="text" name="personal_email" value="<?php echo $result['0']['personal_email']; ?>">
      <p><strong>Fullname</strong></p>
      <input type="text" name="fullname" value="<?php echo $result['0']['fullname']; ?>">
      <p><strong>Slogan</strong></p>
      <textarea rows="5" cols="”40″" name="slogan" value="" autofocus="" style="width: 65%"><?php echo $result['0']['slogan']; ?></textarea>
      <p></p>
      <button type="submit" name="update" class="btn btn-success" style="margin-bottom: 20px;">Cập nhật</button>
</form>