
      <?php
            include 'new_grade.php';
                ?> 
       <div class="col-md-12 st_main" id="s_page">
        
             
              <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title st_judul">Grade List<button style="float:right" type="button" class="btn st_tambah" data-toggle="modal" data-target="#myModal">
          <i class="fa-solid fa-circle-plus fa-lg" style="color:#7E0000"></i> Grade</button></h4>
        </div> 
        <div class="panel-body">  

  <table id="students" class="table table-hover table-borderless">
    <thead>
      <tr id="heads">
        <th style="width:20%">Grade</th>
        <th style="width:10%"></th>
      </tr>
    </thead>
    <tbody class="tbody">
    <?php
    include 'db.php';

    
    $sql=  mysqli_query($conn, "SELECT * FROM grade Order by grade_id ASC ");
    while($row = mysqli_fetch_assoc($sql)) {

        $count = mysqli_num_rows($sql);
     
    ?>

      <tr>
         <input type="hidden" id="id<?php echo $row["grade_id"] ?>" name="id" value="<?php echo $row['grade_id'] ?>">
        <td style="text-align: center"><input id="grade<?php echo $row["grade_id"] ?>"  name="" type="text" style="border:0px; text-align: center; background-color:#D9D9D9" value="<?php echo $row['grade'] ?>" readonly></td>
        <td><center><a onclick="update_grade(<?php echo $row["grade_id"]?>)" class="btn st_edit" > Edit</a></center></td>
      </tr>
    
      <?php
    
    }
     mysqli_close($conn);
      ?>
      
    </tbody>
  </table>
</div>
</div>
</div>

<script>
  function update_grade($i){
   var i = $i;
      $("#id").val($("#id"+i).val());
      $("#grade").val($("#grade"+i).val());
      $("#head").html('Update Grade');
      $("#btn_add").html('Update');
     
  
     



  }
</script>


      <div  class="modal fade" id="myModal" role="dialog">
        
            <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="main-login main-center">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style="margin-top:0px;">&times;</button>
        <h4 id="head"> Tambah Grade </h4>
        </div>
        <div class="modal-body">
          <form class="" method="post">
            <input type="hidden" id="id" name="id">
            <div class="form-group">
              <label for="grade" class="cols-sm-2 control-label">Grade</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-file-text-o" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" id="grade" name="grade"
                  style="width:200px" value="<?php if(isset($_POST['grade'])){echo $_POST['grade'];} ?>"/>
                </div>
                 <p>
            <?php if(isset($errors['grade'])){echo "<div class='erlert' id='alert'><h5>" .$errors['grade']. "</h5></div>"; } ?>
            </p>
              </div>
            </div>
            <div id="status"></div>
  

            <div class="form-group " style="text-align : center">
              <button class="btn st_edit" id="btn_add">Submit</button>
            </div>
            
          </form>
      </div>
        </div>
      </div>

    </div>
    </div>
