<?php
include 'newcurriculm.php';
?>
<script>
    $(document).ready(function(){

    $(document).on('click', '#get_sub', function(e){
  
     e.preventDefault();
  
     var prog = $(this).data('id');      
 
     $.ajax({
          url: 'get_subject.php',
          type: 'POST',
          data: 'prog='+prog,
          beforeSend:function()
{
 $("#content").html('Working on Please wait ..');
},
success:function(data)
{
   $("#content").html(data);
},
     })

    });
})
  </script>
  <div class="col-md-12 st_main">
       <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title st_judul">Curriculum list<button style="float:right" type="button" class="btn st_tambah" data-toggle="modal" data-target="#myModal">
          <i class="fa-solid fa-circle-plus fa-lg" style="color:#7E0000"></i> Add Data</button></h3>
        </div> 
        <div class="panel-body">     
  <table id="students" class="table table-borderless">
    <thead>
      <tr id="heads">
        <th style="width:10%">Kurikulum</th>
        <th style="width:30%">Deskripsi</th>
        <th style="width:20%"></th>
      </tr>
    </thead>
    <tbody class="tbody">
    <?php
    include 'db.php';
    $sql=  mysqli_query($conn, "SELECT * FROM program Order by PROGRAM");
    while($row = mysqli_fetch_assoc($sql)) {


    ?>
    <form method="post" action="update_program.php">
      <tr>
      <input type="hidden" name="id" value="<?php echo $row['PROGRAM_ID'] ?>">
        <td style="text-align:center"><input  name="prog" type="text" style="border:0px;background-color: #D9D9D9;text-align:center" value="<?php echo $row['PROGRAM'] ?>"></td>
        <td><textarea  name="desc" type="text" style="border:0px;width:100%;background-color: #D9D9D9;" ><?php echo $row['DESCRIPTION'] ?></textarea></td>
        <td><center><a class="btn st_edit" data-toggle="modal" data-target="#program" data-id="<?php echo $row['PROGRAM'] ?>" id="get_sub">View</a> &nbsp <button class="btn st_edit" type="submit" style="border:0px;" >update</button></center></td>
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


<div class="modal fade" id="myModal" role="dialog">
        
      <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style="margin-top:3px">&times;</button>
        <h4>Tambahkan Kurikulum</h4>
        </div>
        <div class="modal-body" >
          <form class="" method="post" >
            <input type="hidden" name="id">
            <div class="form-group">
              <label for="sub" class="cols-sm-2 control-label">Kurikulum</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <input type="text" class="form-control ans" name="cur" id="sub"
                  style="width:225px"  placeholder="Masukkan Kurikulum" value="<?php if(isset($_POST['cur'])){echo $_POST['cur'];} ?>"/>
                  <p>
            <?php if(isset($errors['cur'])){echo "<br><br><div class='erlert'><h5>" .$errors['cur']. "</h5></div>"; } ?>
            </p>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="des" class="cols-sm-2 control-label">Deskripsi</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <textarea type="text" class="form-control ans" name="des" id="des"  
                  style="width:225px;height:50px" placeholder="Masukkan Deskripsi" value="<?php if(isset($_POST['des'])){echo $_POST['des'];} ?>" ></textarea>
                  <p>
            <?php if(isset($errors['des'])){echo "<br><br><br><div class='erlert'><h5>" .$errors['des']. "</h5></div>"; } ?>
            </p>
                </div>
              </div>
            </div>


            <div class="form-group ">
              <button  class="btn btn-info st_edit sv_add"  id="submit">Submit</button>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>

    <div class="modal fade" id="program" role="dialog">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Subjects</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                  <div id="content"></div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn st_edit" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
    </div>

