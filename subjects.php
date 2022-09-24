

      <?php
            include 'newsubject.php';
                ?> 
       <div class="col-md-12 st_main" id="s_page">
        
             
              <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title st_judul">List of Subjects <button style="float:right" type="button" class="btn st_tambah" data-toggle="modal" data-target="#myModal">
          <i class="fa-solid fa-circle-plus fa-lg" style="color:#7E0000"></i> Add Data</button></h3>
        </div> 
        <div class="panel-body">  

  <table id="students" class="table table-borderless">
    <thead>
      <tr id="heads">
        <th style="width:20%">Nama</th>
        <th style="width:10%">Kurikulum</th>
        <th style="width:10%">Deskripsi</th>
        <th style="width:10%"></th>
      </tr>
    </thead>
    <tbody class="tbody">
    <?php
    include 'db.php';

    
    $sql=  mysqli_query($conn, "SELECT *,`FOR` as para FROM subjects Order by SUBJECT ");
    while($row = mysqli_fetch_assoc($sql)) {

        $count = mysqli_num_rows($sql);
     
    ?>

      <tr>
         <input type="hidden" id="id<?php echo $row["SUBJECT_ID"] ?>" name="id" value="<?php echo $row['SUBJECT_ID'] ?>">
        <td><input id="sub<?php echo $row["SUBJECT_ID"] ?>"  name="subj" type="text" style="border:0px;background-color: #D9D9D9;" value="<?php echo $row['SUBJECT'] ?>" readonly></td>
          <td style="text-align:center;"><input id="para<?php echo $row["SUBJECT_ID"] ?>"  name="subj" type="text" style="border:0px;background-color: #D9D9D9;text-align:center;" value="<?php echo $row['para'] ?>" readonly></td>
        <td><input id="des<?php echo $row["SUBJECT_ID"] ?>" name="desc" type="text" style="border:0px;width:100%;background-color: #D9D9D9;" value="<?php echo $row['DESCRIPTION'] ?>" readonly></td>
        <td><center><a onclick="update_subject(<?php echo $row["SUBJECT_ID"] ?>)" class="btn st_edit" data-toggle="modal" data-target="#myModal1">&nbspEdit&nbsp</a></center></td>
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
  function update_subject($i){
    var act,sub,para,desc,i =$i;
      para = $("#para"+i).val();
      $("#id").val($("#id"+i).val());
      $("#sub").val($("#sub"+i).val());
      $("#para").html(para);
      $("#des").val($("#des"+i).val());


  }
</script>

<!--new data -->
      <div class="modal fade" id="myModal" role="dialog">
        
      <div  class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="">Tambah Mata Pelajaran</h4>
        </div>
        <div class="modal-body">
            <form class="" method="post">
              <input type="hidden" id="" name="id">
              <div class="form-group">
                <label for="sub" class="cols-sm-2 control-label">Nama</label>
                <div class="cols-sm-4">
                  <div class="input-group">
                    <input type="text" class="form-control ans" id="" name="sub" id=""
                    style="width:200px"  placeholder="Nasukkan Nama"/>
                  </div>
                  <p>
              <?php if(isset($errors['sub'])){echo "<div class='erlert'><h5>" .$errors['sub']. "</h5></div>"; } ?>
              </p>
                </div>
              </div>
              <div class="form-group">
                <label for="sub" class="cols-sm-2 control-label">Kurikulum</label>
                <div class="cols-sm-4">
                  <div class="input-group">
                    <select name="f" class="form-control ans" id="">
                    <option id=""></option>
                    <option>All</option>
                    <?php
                    include 'db.php';
                    $sql = mysqli_query($conn,"SELECT * from program ORDER BY PROGRAM");
                    while($row=mysqli_fetch_assoc($sql)){
                    ?>
                    <option>
                    <?php echo $row['PROGRAM'] ?>
                    </option>
                    <?php } mysqli_close($conn); ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="des" class="cols-sm-2 control-label">Deskripsi</label>
                <div class="cols-sm-4">
                  <div class="input-group">
                    <textarea type="text" class="form-control ans" name="des" id=""  
                    style="width:225px;height:50px" placeholder="Masukkan Deskripsi"/></textarea>
                  </div>
              <p>
              <?php if(isset($errors['des'])){echo "<div class='erlert'><h5>" .$errors['des']. "</h5></div>"; } ?>
              </p>
                </div>
              </div>


              <div class="form-group ">
                <button class="btn st_edit sv_add" id="">Submit</button>
              </div>
              
            </form>
          </div>
        </div>
      </div>

    </div>

<!-- end new data subject -->

<!--edit data-->
<div class="modal fade" id="myModal1" role="dialog">
        
        <div  class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" id="head">Edit Mata Pelajaran</h4>
          </div>
          <div class="modal-body">
              <form class="" method="post">
                <input type="hidden" id="id" name="id">
                <div class="form-group">
                  <label for="sub" class="cols-sm-2 control-label">Nama</label>
                  <div class="cols-sm-4">
                    <div class="input-group">
                      <input type="text" class="form-control ans" id="sub" name="sub" id="sub"
                      style="width:200px"  placeholder="Nasukkan Nama" value="<?php if(isset($_POST['sub'])){echo $_POST['sub'];} ?>"/>
                    </div>
                    <p>
                <?php if(isset($errors['sub'])){echo "<div class='erlert'><h5>" .$errors['sub']. "</h5></div>"; } ?>
                </p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="sub" class="cols-sm-2 control-label">Kurikulum</label>
                  <div class="cols-sm-4">
                    <div class="input-group">
                      <select name="f" class="form-control ans" id="para1">
                      <option id="para"></option>
                      <option>All</option>
                      <?php
                      include 'db.php';
                      $sql = mysqli_query($conn,"SELECT * from program ORDER BY PROGRAM");
                      while($row=mysqli_fetch_assoc($sql)){
                      ?>
                      <option value="<?php echo $row['PROGRAM'] ?>">
                      <?php echo $row['PROGRAM'] ?>
                      </option>
                      <?php } mysqli_close($conn); ?>
                      </select>
                    </div>
                  </div>
                </div>
  
                <div class="form-group">
                  <label for="des" class="cols-sm-2 control-label">Deskripsi</label>
                  <div class="cols-sm-4">
                    <div class="input-group">
                      <textarea type="text" class="form-control ans" name="des" id="des"  
                      style="width:225px;height:50px" placeholder="Masukkan Deskripsi" value="<?php if(isset($_POST['des'])){echo $_POST['des'];} ?>"/></textarea>
                    </div>
                <p>
                <?php if(isset($errors['des'])){echo "<div class='erlert'><h5>" .$errors['des']. "</h5></div>"; } ?>
                </p>
                  </div>
                </div>
  
  
                <div class="form-group ">
                  <button class="btn st_edit sv_add" id="btn_add">Save</button>
                </div>
                
              </form>
            </div>
          </div>
        </div>
  
      </div>
<!--end edit data -->

 <script type="text/javascript">
        $(function() {
            $("#students").dataTable(
        { "aaSorting": [[ 0, "asc" ]] }
      );
        });
    </script>
