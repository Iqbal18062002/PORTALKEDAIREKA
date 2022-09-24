



       <div class="col-md-12 st_main"> 
       <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title st_judul">Form</h3>
        </div> 
        <div class="panel-body">  
  <table id="students" class="table table-borderless">
    <thead>
      <tr id="heads">
        <th style="width:10%">NISN</th>
        <th style="width:20%">Nama</th>
        <th style="width:10%">Gender</th>
        <th style="width:10%">Kurikulum</th>
        <th style="width:10%"></th>
      </tr>
    </thead>
    <tbody class="tbody">
    <?php
    include 'db.php';
    $sql=  mysqli_query($conn, "SELECT * FROM student_info ");
    while($row = mysqli_fetch_assoc($sql)) {
       $sql2=  mysqli_query($conn, "SELECT * FROM program WHERE PROGRAM_ID = '".$row['PROGRAM']."' ");
         while($row2 = mysqli_fetch_assoc($sql2)) {


    ?>
      <tr>

        <td><?php echo $row['LRN_NO'] ?></td>
        <td><?php echo $row['LASTNAME'] . ' ' . $row['FIRSTNAME']. ' ' . $row['MIDDLENAME'] ?></td>
        <td style="text-align:center;"><?php echo $row['GENDER'] ?></td>
        <td style="text-align:center;"><?php echo $row2['PROGRAM'] ?></td>
        <td><a class="btn st_edit" onclick='window.open("form137.php?id=<?php echo $row['STUDENT_ID'] ?>")'>Print</a></td>
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

    </div>


     <script type="text/javascript">
        $(function() {
            $("#students").dataTable(
        { "aaSorting": [[ 0, "asc" ]] }
      );
        });
    </script>

