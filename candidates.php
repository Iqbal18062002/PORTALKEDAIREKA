
       <div class="col-md-12 st_main"> 
       <div class="row">
      <div class="alert alert-success" id="correct"> Berhasil Naik Kelas!!</div>
        </div>   
       <div class="panel panel-default">
        <div class="panel-heading">
        <center><button style="float:right; margin-top:20px;" class="btn st_tambah" type="submit"><i class="fa-solid fa-circle-up fa-lg" style="color:#7E0000"></i> Promote</button>
        <input type="hidden" name="sy" id="sy" value="<?php echo $_GET['sy'] ?>"></center>
          <h3 class="panel-title st_judul">Promote Candidates</h3>
        </div> 
        <div class="panel-body"> 

      <form id="promote" method="POST" >
  <table id="students" class="table table-borderless">
    <thead>
      <tr id="heads">
       
       
        <th style="width:10%">NISN</th>
        <th style="width:20%">Nama</th>
        <th style="width:10%">Gender</th>
        <th style="width:10%">Kurikulum</th>
        <th style="width:10%"><center><label><input type="checkbox" id="selectall">Promote</label></center></th>
      </tr>
    </thead>
    <tbody class="tbody">
    <?php
    include 'db.php';

    $sql=  mysqli_query($conn, "SELECT * FROM student_info left join program on student_info.PROGRAM=program.PROGRAM_ID WHERE STUDENT_ID Not IN (SELECT STUDENT_ID FROM promotion_candidates) ");
    while($row = mysqli_fetch_assoc($sql)) {
      


    ?>
      <tr>
        
        <td><?php echo $row['LRN_NO'] ?></td>
        <td><?php echo $row['LASTNAME'] . ' ' . $row['FIRSTNAME']. ' ' . $row['MIDDLENAME'] ?></td>
        <td style="text-align:center"><?php echo $row['GENDER'] ?></td>
        <td style="text-align:center"><?php echo $row['PROGRAM'] ?></td>
        <td><center><input type="checkbox" name="id[]" class="checkitems" value="<?php echo $row['STUDENT_ID'] ?>"></center></td>
      </tr>
      <?php
    
    
    } mysqli_close($conn);
      ?>
      </form>
    </tbody>
  </table>
</div>
</div>
</div>
 <script type="text/javascript">

        $(function() {

            $("#students").dataTable(
        { "aaSorting": [[ 0, "asc" ]] }
      );

        }); 


    </script>
    <script>
    jQuery(document).ready(function(){
            $('#correct').hide()
            jQuery("#promote").submit(function(e){
                e.preventDefault();
                var formData = jQuery(this).serialize();
                var sy =$('#sy').val();
                $.ajax({
                  type: "POST",
                  url: "promote.php",
                  data: formData,
                  success: function(html){
                  if(html=='true' )
                  {
                    $("#correct").slideDown();
                    var delay = 2000;
                    setTimeout(function(){  window.location.href='rms.php?page=candidates&sy='+sy;   }, delay);  
                  }                  }
                });
                  return false;
            
            });
            });
  
</script>
    <script>
        $("#selectall").click(function() 
{   $('.checkitems').prop("checked", $(this).prop("checked"));
});


  </script>


