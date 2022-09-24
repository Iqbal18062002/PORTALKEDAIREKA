

<script>
    $(document).ready(function(){

    $(document).on('click', '#getUser', function(e){
  
     e.preventDefault();
  
     var uid = $(this).data('id');      
 
     $.ajax({
          url: 'view_user.php',
          type: 'POST',
          data: 'id='+uid,
          beforeSend:function()
{
 $("#e_user").html('Working on Please wait ..');
},
success:function(data)
{
   $("#e_user").html(data);
},
     })

    });
})
  </script>
     <?php include 'newaccount.php' ?>
       <div class="col-md-12 st_main">   
              <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title st_judul">Users<button style="float:right" type="button" class="btn st_tambah" data-toggle="modal" data-target="#myModal">
          <i class="fa-solid fa-circle-plus fa-lg" style="color:#7E0000"></i> Add Data</button></h3>
        </div> 
        <div class="panel-body">  

  <table id="students" class="table table-hover table-borderless">
    <thead>
      <tr id="heads">
        <th style="width:20%">Name</th>
        <th style="width:10%">User</th>
        <th style="width:10%">Type</th>
        <th style="width:10%"></th>
      </tr>
    </thead>
    <tbody class="tbody">
    <?php
    include 'db.php';
    $sql=  mysqli_query($conn, "SELECT * FROM user ");
    while($row = mysqli_fetch_assoc($sql)) {


    ?>
    <form method="post" action="update_subject.php">
      <tr>
        <td><?php echo $row['FIRSTNAME']." ".$row['LASTNAME'] ?></td>
        <td style="text-align:center"><?php echo $row['USER'] ?></td>
        <td style="text-align:center"><?php echo $row['USER_TYPE'] ?></td>
        <td style="text-align:center;"><a data-toggle="modal" data-target="#edit_user" data-id="<?php echo $row['USER_ID'] ?>" id="getUser" class="btn st_edit"> Edit</a></td>
      </tr>
      </form>
      <?php
    } mysqli_close($conn);
      ?>
      
    </tbody>
  </table>
</div>
</div>
</div>

<!-- new modal content -->

      <div class="modal fade" id="myModal" role="dialog">
        
            <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="main-login main-center ">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin-top:0px;">&times;</button>
            <h4>Tambah User</h4>
        </div>
        <div class="modal-body" style="margin-left:150px">
          <form class="" method="post">
            <div class="form-group">
              <label for="sub" class="cols-sm-2 control-label">First Name</label>
              <div class="cols-sm-4">
                <div class="input-group">
        <input type="text" class="form-control ans wd" style="text-transform: capitalize;" id="fname" name="lname" placeholder="Masukkan nama depan" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="sub" class="cols-sm-2 control-label">Last Name</label>
              <div class="cols-sm-4">
                <div class="input-group">
        <input type="text" class="form-control ans wd" style="text-transform: capitalize;" id="fname" name="fname" placeholder="Masukkan nama belakang" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="sub" class="cols-sm-2 control-label">User</label>
              <div class="cols-sm-4">
                <div class="input-group">
        <input type="text" class="form-control ans wd" id="fname" name="user" placeholder="Masukkan nama user" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="sub" class="cols-sm-2 control-label">Password</label>
              <div class="cols-sm-4">
                <div class="input-group">
        <input type="password" class="form-control ans wd" id="fname" name="pwd" placeholder="Masukkan password" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="sub" class="cols-sm-2 control-label">User Type</label>
              <div class="cols-sm-4">
                <div class="input-group">
        <select class="form-control ans wd" name="type" id="" required>
        <option></option>
          <option value="ADMINISTRATOR">ADMINISTRATOR</option>
          <option value="STAFF">STAFF</option>n>
        </select>                </div>
              </div>
            </div>
            

        </div>
          <div class="modal-footer" style="text-align:center">
            <div class="form-group " >
              <button class="btn st_edit">Submit</button>
            </div>
         </div>
            
          </form>
        </div>

      </div>
  </div>
    </div>
  </div>
    <!-- new modal content end -->

    <!-- Modal content edit-->
    <div class="modal fade" id="edit_user" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit User</h4>
        </div>
        <div class="modal-body" style="margin-left:90px"> 
                  <form class="form-group" method="POST" action="edit_user.php"> 
                      <div class="container">                 
                     <div id="e_user">
                      
                      </div>
                     </div>
                  </div> 
                                  
                  <div class="modal-footer"  style="border:0px; text-align:center; padding-bottom: 30px">
                   
                  <button type="submit" class="btn st_edit">&nbsp Save &nbsp</button>
                  </div>
    </div>
        </div>
        </div>
  </div>
        <!--modal content edit end-->
      
 <script type="text/javascript">
        $(function() {
            $("#students").dataTable(
        { "aaSorting": [[ 0, "asc" ]] }
      );
        });
    </script>
