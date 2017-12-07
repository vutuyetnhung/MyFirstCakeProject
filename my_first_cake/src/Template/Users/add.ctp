<?php use Cake\ORM\TableRegistry;?>
<div class="container-fluid" id="thanhvien">
    
       <div id="add">
          <form id="myForm" style="margin-left: 15%;width: 70%;height: 30px;border: 1px solid #cdd4d1;text-align: center;padding-top: 5px;margin-bottom: 10px;">
            <p>THÊM THÀNH VIÊN</p>
          </form>

          <form action="add" method="POST" style="margin-left: 15%;width: 70%;border: 1px solid #cdd4d1;padding: 10PX">
           <div>
          
                <!-- <?= $this->Flash->render(); //để dấu bằng ms ra dc

                $this->fetch('content') ?> -->
           </div>
           <div class="form-group">
              <label>Tên đăng nhập</label><br><input id="" type="text" name="username" class="form-control"><br>
           </div>
           <!--  <label>Tên đăng nhập</label><br><input id="" type="text" name="username" class="form-control"><br> -->
            <label>Mật khẩu</label><br><input id="" type="password" name="password" class="form-control"><br>
            <label>Email</label><br><input id="" type="text" name="personal_email" class="form-control"><br>
            <label>Tên đầy đủ</label><br><input id="" type="text" name="fullname" class="form-control"><br>
            <label>Nickname</label><br><input id="" type="text" name="nickname"><br>
            <label>Nhóm</label><br>
             <select class="form-control" name="selgroup">
             <?php 
                $groupTable = TableRegistry::get('GroupTbl');
                $result = $groupTable->find('all')->select(['group_id', 'name'])->toArray();
                foreach ($result as $key => $value) {
                  ?>
                <option value="<?php echo $value['group_id']; ?>"><?php echo $value['name']; ?></option>
               <?php }
                // $aa = $result['0']['group_id'];echo $aa;lay ra groupid thu 1 ?> 
              </select>
            <br>
            <label>Vị trí</label><br>
             <select class="form-control" name="selrole">
               <?php 
                $roleTable = TableRegistry::get('RoleMst');
                $result = $roleTable->find('all')->select(['role_id', 'value'])->toArray();
                foreach ($result as $key => $value) {
                  ?>
                <option value="<?php echo $value['role_id']; ?>"><?php echo $value['value']; ?></option>
               <?php }
                 ?> 
              </select>
            <br>
            <label>Khẩu hiệu</label><br><textarea  rows="5" style="width: 100%" name="slogan"></textarea><br>
            <button type="button" class="btn btn-default">Quay lại</button>
            
            <button type="submit" name="btnThemThanhVien" class="btn btn-success" style="margin-left: 32%;">Lưu lại</button>

              <script type="text/javascript">
    // jQuery.validator.addMethod("gmail", function(value, element) {
    // return this.optional( element ) || /^.+@gmail\.com$/.test( value );
    // }, 'Please enter a valid email address.');
    $("#myForm").validate({
      rules: {
      "username":{
        required: true,
        maxlength: 20,
        minlength: 6
      },
     
      "password": {
        required: true
      }
     
      },
      messages: {
        username:{
          required: "Username is required.",
          maxlength: "Username must be less than 20",
          minlength: "Username must be more than 6"
        },
       
        password: {
          required: "Password is required"
        }
      }
    });
  </script>
          </form>
        </div>