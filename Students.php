
<script>
    $(document).ready(function(){

    $(document).on('click', '#getUser', function(e){
  
     e.preventDefault();
  
     var uid = $(this).data('id');      
 
     $.ajax({
          url: 'view_students.php',
          type: 'POST',
          data: 'id='+uid,
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

  <style>
    *{
        font-family:mon;
    }
    </style>
   <?php
  include 'newstudent.php';
  ?>
  


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
     
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Students</h4>
        </div>
        <div class="modal-body">

 

        
 <form class="form-horizontal" method="post">
<fieldset>
<div class="container">

<div class="col-md-12" style="width:70%;border-bottom:1px solid #333">
<h4><b>Student's Personal Details </b></h4>
</div>
<br>
<br>
<div class="col-md-4">
<br>
<div class="form-group">
  <label class="col-xs-4 control-label" for="lrn">NISN</label>  
  <div class="col-xs-6">
  <input id="lrn" name="lrn" type="text" placeholder="Enter LRN " maxlength="12" class="form-control input-xs ans" required="">
  </div>
</div>

<!-- Prepended text-->
<div class="form-group">
  <label class="col-xs-4 control-label" for="name">Name</label>
  <div class="col-xs-8">
    <div class="input-group">
      <input id="name" class="form-control input-xs ans"
      style="text-transform: capitalize;" name="lname" placeholder="Lastname"  type="text" required="">
      <input id="name" class="form-control input-xs ans"
      style="text-transform: capitalize;" name="fname" placeholder="Firstname"  type="text" required="">
      <input id="name" class="form-control input-xs ans"
      style="text-transform: capitalize;" name="mname" placeholder="Middlename"  type="text" required="">

    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-xs-4 control-label" for="gender">Gender</label>
  <div class="col-xs-4">
    <select id="gender" name="gender" class="form-control input-xs ans">
      <option value="MALE">Male</option>
      <option value="FEMALE">Female</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-xs-4 control-label" for="address">Birth Place</label>
  <div class="col-xs-8">
    <div class="input-group">
      <input id="address" class="form-control ans"
      style="text-transform: capitalize;" name="bp" placeholder="Birth Place"  type="text" required="">    </div>
  </div>
</div>
</div>


<div class="col-md-4">
<br>
<br>
<br>

<div class="form-group">
  <label class="col-xs-5 control-label" for="dob">Date of Birth</label>  
  <div class="col-xs-7">
  <input id="dob" name="dob" type="date" placeholder="YYYY-MM-DD" class="form-control input-md ans" required="">
  </div>
</div>

<div class="form-group">
  <label class="col-xs-5 control-label" for="pob">ADDRESS</label>  
  <div class="col-xs-7">
  <input id="pob" name="pob" type="text" style="text-transform: capitalize;" placeholder="Enter Student Address" class="form-control input-xs ans" required="">
  </div>
</div>


<div class="form-group">
  <label class="col-xs-5 control-label" for="pg">Parent/Guardian</label>
  <div class="col-xs-7">
    <div class="input-group">
      <input id="pg" name="pg" class="form-control ans" style="text-transform: capitalize;" placeholder="Enter Full Name" type="text" required="">
      <input id="pg" name="pg_add" class="form-control ans" style="text-transform: capitalize;" placeholder="Enter Address" type="text" required="">

    </div>
  </div>
</div>
</div>
<div class="col-md-12" style="width:70%;border-bottom:1px solid #333">
<h4><b>Intermediate Course Details </b></h4>
</div>
<br>
<br>
<div class="col-md-12">
<br>
<div class="form-group">
  <label class="col-xs-2 control-label" for="icc">Intermediate Course Completed</label> 
  <br>
  <div class="col-xs-6">
  <input id="icc" name="icc" type="text"
  style="text-transform: capitalize;"
   placeholder="Enter School Graduated " class="form-control input-xs ans" required="">
  </div>
</div>


  <div class="form-group">
    <label class="col-xs-2 control-label" for="sy">School Year</label>
  
  <div class="col-xs-10">
    <input class="form-control ans" style="width:150px" id="sy" name="sy" type="text"
     placeholder="FROM-TO">

  </div>
  </div>
  

  <div class="form-group">
  <label class="col-xs-2 control-label" for="tn">Total Nummber Of Years</label> 
  <br>
  <div class="col-xs-6">
  <input id="tn" name="tny" type="number" style="width:100px;text-align:right"
   class="form-control input-xs ans" required="">
  </div>
</div>

<div class="form-group">
  <label class="col-xs-2 control-label" for="ave">General Average</label> 
  <div class="col-xs-6">
  <input id="ave" name="ave" type="integer" style="width:100px;text-align:right"
   class="form-control input-xs ans" required="">

  </div>
</div>
</div>
<div class="col-md-12" style="width:70%;border-bottom:1px solid #333">
<h4><b>Program Enrolled </b></h4>
</div>
<br><br>
<div class="form-group">
  <label class="col-xs-4 control-label" for="Prog">Curriculum</label>
  <div class="col-xs-4">
    <select id="prog" name="prog" class="form-control input-xs ans" required="">
    <option></option>
    <?php
    include 'db.php';
    $sql = mysqli_query($conn,"SELECT * from program Order by PROGRAM ASC");
    while($row=mysqli_fetch_assoc($sql)){
    ?>
      <option value="<?php echo $row['PROGRAM_ID'] ?>"><?php echo $row['PROGRAM'] ?></option>
      <?php
    }
    mysqli_close($conn);
      ?>
    </select>
  </div>
</div>


</div>
</fieldset>





        </div>
        <div class="modal-footer">
        <!--<input type="reset" class="btn btn-success " id="reset" name="reset" value="Reset Form">-->
      <input type="submit" class="btn st_edit " name="submitb" value="Submit Form">
      
        </form>
        </div>
      </div>
      
    </div>
  </div>



<div class="col-md-12 st_main">
          
       <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title st_judul">Students List <button style="float:right" type="button" class="btn st_tambah" data-toggle="modal" data-target="#myModal">
          <i class="fa-solid fa-circle-plus fa-lg" style="color:#7E0000"></i> Add Data</button></h3>

        </div> 
  <div class="panel-body"> 
  <table id="students" class="table table-borderless table-condensed">
    <thead>
      <tr id="heads">
        <th style="width:10%;">NISN</th>
        <th style="width:30%;">Nama</th>
        <th style="width:20%;">Kurikulum</th>
        <th style="width:10%"></th>
      </tr>
    </thead>
    <tbody class="tbody">
    <?php
    include 'db.php';
    $sql=  mysqli_query($conn, "SELECT * FROM student_info order by LASTNAME ");
    while($row = mysqli_fetch_assoc($sql)) {
      $sid = $row['STUDENT_ID'];
      $sql2=  mysqli_query($conn, "SELECT * FROM program WHERE PROGRAM_ID = '".$row['PROGRAM']."' ");
         while($row2 = mysqli_fetch_assoc($sql2)) {    


    ?>
      <tr>


        <td><?php echo $row['LRN_NO'] ?></td>
        <td><?php echo $row['LASTNAME'] . ', ' . $row['FIRSTNAME']. ' ' . $row['MIDDLENAME'] ?></td>
        
        <td style="text-align:center"><?php echo $row2['PROGRAM'] ?></td>
        
     
      <td style="text-align:center"> 
     <a  class="btn st_edit" data-toggle="modal" data-target="#view-modal" data-id="<?php echo $sid ?>" id="getUser">View</a>
     </td>
       </tr>

      <?php
    }
    } mysqli_close($conn);
      ?>
    </tbody>
  </table>
</div>
</div> 
</div>

       <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-lg">  
             
                  <div class="modal-header"> 
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa-solid fa-xmark"></i></button> 
                     <h4 class="modal-title">
                     <i class=""></i> View Student
                     </h4> 
                  </div> 
                       <div id="content">
                        
                     </div>
                                 
              </div> 
            </div>
          </div>  



<script type="text/javascript">
        $(function() {
            $("#students").dataTable(
        { "aaSorting": [[ 2, "asc" ]] }
      );
        });
    </script>
