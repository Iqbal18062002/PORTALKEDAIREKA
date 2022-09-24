
      <?php
            include 'new_school_year.php';
                ?> 
       <div class="col-md-12 st_main" id="s_page">
        
             
              <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title st_judul">List of School Year<button style="float:right" type="button" class="btn st_tambah" data-toggle="modal" data-target="#myModal">
          <i class="fa-solid fa-circle-plus fa-lg" style="color:#7E0000"></i> School Year</button></h3>
        </div> 
        <div class="panel-body">  

  <table id="students" class="table table-hover table-borderless">
    <thead>
      <tr id="heads">
        <th style="width:20%">School Year</th>
        <th style="width:10%">Current</th>
        <th style="width:10%"></th>
      </tr>
    </thead>
    <tbody class="tbody">
    <?php
    include 'db.php';

    
    $sql=  mysqli_query($conn, "SELECT * FROM school_year Order by school_year DESC ");
    while($row = mysqli_fetch_assoc($sql)) {

        $count = mysqli_num_rows($sql);
     
    ?>

      <tr>
         <input type="hidden" id="id<?php echo $row["SY_ID"] ?>" name="id" value="<?php echo $row['SY_ID'] ?>">
        <td style="text-align: center"><input id="sy<?php echo $row["SY_ID"] ?>"  name="sy" type="text" style="border:0px; background-color:#D9D9D9; text-align:center" value="<?php echo $row['school_year'] ?>" readonly></td>
          <td style="text-align: center"><input id="stats<?php echo $row["SY_ID"] ?>"  name="stats" type="text" style="border:0px; background-color:#D9D9D9; text-align:center" value="<?php echo $row['status'] ?>" readonly></td>
        <td><center><a onclick="update_sy(<?php echo $row["SY_ID"]?>)" class="btn st_edit" >&nbsp Edit &nbsp</a></center></td>
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
  function update_sy($i){
   var i = $i;
   var stats = $("#stats"+i).val();
      $("#id").val($("#id"+i).val());
      $("#sy").val($("#sy"+i).val());
      $("#head").html('Update School Year');
      $("#btn_add").html('Update');
     
    data = '<div class="form-group">'+
              '<label for="sy" class="cols-sm-2 control-label">Current</label>'+
            '<div class="cols-sm-4">'+
            '<select name="status" class="form-control">'+
            '<option>'+stats+'</option>'+
              '<option>No</option>'+
              '<option>Yes</option>'+
            '</select>'+
             '</div>'+
            '</div>';
            $('#status').html(data);


     



  }
</script>


      <div class="modal fade" id="myModal" role="dialog">
        
            <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="main-login main-center">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style="margin-top:0px;">&times;</button>
        <h4 id="head">New School Year</h4>
        </div>
        <div class="modal-body">
          <form class="" method="post">
            <input type="hidden" id="id" name="id">
            <div class="form-group">
              <label for="sy" class="cols-sm-2 control-label">School Year</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <input type="text" class="form-control ans" id="sy" name="sy"
                  style="width:200px"  placeholder="ex (2017-2018)" value="<?php if(isset($_POST['sy'])){echo $_POST['sy'];} ?>"/>
                </div>
                 <p>
            <?php if(isset($errors['sy'])){echo "<div class='erlert' id='alert'><h5>" .$errors['sy']. "</h5></div>"; } ?>
            </p>
              </div>
            </div>
            <div id="status"></div>

            <div class="form-group">
              <label for="sub" class="cols-sm-2 control-label">Current</label>
              <div class="cols-sm-4">
                <div class="input-group">
        <select class="form-control ans" name="type" id="" required>
        <option></option>
          <option value="YES">Yes</option>
          <option value="NO">No</option>n>
        </select>                </div>
              </div>
            </div>
  

            <div class="form-group ">
              <button class="btn st_edit" id="btn_add">Submit</button>
            </div>
            
          </form>
        </div>
      </div>

    </div>
    </div>

