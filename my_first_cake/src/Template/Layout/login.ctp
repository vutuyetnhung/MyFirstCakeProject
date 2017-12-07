<!DOCTYPE html>
<html>
<head>
	<title>Form login</title>
	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
	
	<div class="container">
		<form action="" method="POST" style="margin-top: 14%;margin-left: 33%;width: max-content;border: 1px solid aquamarine;border-radius: 5px;">
			<h1 style="text-align: center;background: aquamarine;    margin-top: 0">JVB SYSTEM</h1>
			<div class="form-group" style="padding: 0 5%;"  >
				<div class="input-group input-group-lg" style="width:100%">
				  <span class="input-group-addon" style="width:60px">
					<i class="fa fa-envelope"></i>
				  </span>
				  <input class="form-control" type="text" name="username" placeholder="Tên">
				</div>
			
			</div>
			<div class="form-group" style="padding: 0 5%;">	
				<div class="input-group input-group-lg" style="width:100%">
				  <span class="input-group-addon" style="width:60px">
					<i class="fa fa-lock"></i>
				  </span>
				  <input id="" name="password" class="form-control" type="password" placeholder="Mật khẩu">
				</div>
			</div>
			<div>
				<div class="checkbox" style="padding: 0 5%;">
				  <label><input type="checkbox" name="remember">Ghi nhớ mật khẩu</label>
				  <label><a href="#">Quên mật khẩu?<br></a></label>
				</div>
			</div>
			<div>
					
           			<?= $this->Flash->render(); //để dấu bằng ms ra dc

               		$this->fetch('content') ?>
			</div>
			<button type="submit" name="login" onclick="" class="btn btn-success" style="margin-left: 35%;margin-bottom: 7%;">Đăng nhập</button>
	</form>
</div>
</body>
</html>