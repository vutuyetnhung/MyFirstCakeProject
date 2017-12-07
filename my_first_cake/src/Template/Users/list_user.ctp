
 <article id="main-content">
      <div class="container-fluid">
        <div style="margin: 50px 0;">
          <input type="text" name="" style="border-radius: 3px;width: 25%;" placeholder="Nhập từ khóa và nhấn Enter">
         <button type="button" class="btn btn-success">Tìm kiếm</button></div>
        
      </div>
    </article>
   
   <div id="thanhviencu">

            <div style="margin: 30px 0;">
            <div>
               <button><?php echo $this->HTML->link('Thêm thành viên',array('controller' => 'Users', 'action' => 'add'));?></button>  
            </div>
           
           
          <div class="">
            <p style="text-align: center;background: #cbecec;padding: 8px;">DANH SÁCH THÀNH VIÊN</p>
          </div>
          <div>
            <table id="tableuser" class="table table-bordered" style="margin: 5px">
              <thead>
                <tr>
                  
                  <th>STT</th>
                  <th>NHÓM</th>
                  <th>EMAIL</th>
                  <TH>HỌ VÀ TÊN</TH>
                  <TH>KHẨU HIỆU</TH>
                  <TH>VỊ TRÍ</TH>
                  <th></th> 
                 
                </tr>
              </thead>
              <tbody>
                <script type="text/javascript">
                  
                    function showAlert($user_delete_id){
                      if(confirm(alert('Bạn thật sự muốn xóa người dùng này?'))){
                         alert('hi nhung');
                      }

                    }
                </script>
                <?php
                    if($data==NULL){
                     echo "<h2>Dada Empty</h2>";
                    }
                    else{
                        $i = 1;
                     foreach($data as $key => $value){
                      ?>
                      <tr>
                        <td><?php echo $i++?></td>
                        <td><?php echo $group[$value['UserGroupTbl']['group_id']]; ?></td>
                        <td><?php echo $value['personal_email'];?></td>
                        <td><?php echo $value['fullname'];?></td>
                        <td><?php echo $value['slogan'];?></td>
                        <td><?php echo $role[$value['UserRoleTbl']['role_id']];?></td>
                        <td><button><?php echo $this->Html->link(
                              'Delete',
                              ['controller' => 'Users', 'action' => 'delete' ,$value['user_id']],
                              ['confirm' => 'Are you sure you wish to delete this user?']
                          )?></button></td>
                      </tr>
                      <?php
                     }
                    }
                    ?>
         
              </tbody>

            </table>
        
        <div style="">
           <button type="button" class="btn btn-primary">1</button>
            <button type="button" class="btn btn-primary">2</button>
             <button type="button" class="btn btn-primary">3</button>
        </div>
          </div>
  
        </div>
        </div>
        </article>