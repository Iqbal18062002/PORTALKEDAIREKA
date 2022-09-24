<?php 
include 'db.php';

$query = mysqli_query($conn,"SELECT * FROM school_year where status='Yes' ");
$s = mysqli_fetch_assoc($query);
$school_year=$s['school_year'];
?>



 <ul class="nav navbar-nav side-nav">
<li>
    <table class="judul">
        <tr>
            <th><img src="logo.jpeg" class="logo"></th>
            <th>
                <p class="judul_atas">Portal</p>
                <p class="judul_bawah">Harum Sentosa Baru</p>
            </th>
        </tr>
    </table>
</li>
 <li>
<a href="rms.php?page=home"><i class="fa fa-columns" aria-hidden="true"></i> Dashboard</a>
</li>
<li>
<a id=demo1 href="javascript:void(0)" data-toggle="collapse" data-target="#masterlistCollapse"><i class="fa-solid fa-bars-staggered"></i> Master List <i class="fa fa-fw fa-caret-down"></i></a>
<ul id="masterlistCollapse" class="collapse">
    <li>
        <a href="rms.php?page=Students">Students List</a>
    </li>
    <li class="">
        <a href="rms.php?page=subjects"></i> Subjects List</a>
    </li>
    <li class="">
        <a href="rms.php?page=program"></i> Curriculum List</a>
    </li>
</ul>
</li>
<li>
    <a href="javascript:void(0)" data-toggle="collapse" data-target="#recordsCollapse"><i class="fa fa-file" aria-hidden="true"></i> Records       <i class="fa fa-fw fa-caret-down"></i></a>
    <ul class="collapse" id="recordsCollapse">
        <li>
            <a href="rms.php?page=records">Academic Record </a>
        </li>
        <li>
            <a href="rms.php?page=candidates&sy=<?php echo $school_year ?>">Promote Candidates </a>
        </li>
        <li>
            <a href="rms.php?page=candidates_list&sy=<?php echo $school_year ?>">Candidates List </a>
        </li>
    </ul>
</li>
<li>
    <a href="javascript:void(0)" data-toggle="collapse" data-target="#reportsCollapse"><i class="fa-solid fa-file-signature"></i> Reports       <i class="fa fa-fw fa-caret-down"></i></a>
    <ul id="reportsCollapse" class="collapse">
        <li>
            <a href="rms.php?page=report">Form</a>
        </li>
        <li>
            <a href="#" data-toggle="modal" data-target="#s_report">Students List</a>
        </li>
        <li>
            <a href="rms.php?page=candidates_report&school_year=<?php echo $school_year ?>">Candidates Report</a>
        </li>
    </ul>
</li>
<li>
    <a href="rms.php?page=users"><i class="fa-solid fa-user-group"></i> Users</a>
</li>
<li>
    <a href="javascript:void(0)" data-toggle="collapse" data-target="#maintenanceCollapse"><i class="fa-solid fa-rotate"></i> Maintenance       <i class="fa fa-fw fa-caret-down"></i></a>
    <ul id="maintenanceCollapse" class="collapse">
        <li>
            <a href="rms.php?page=school_year">School Year</a>
        </li>
        <li>
            <a href="rms.php?page=grade">Grade List</a>
        </li>
    </ul>
</li>

</ul>
<script>
    $('.side-nav li a').each(function(){
        if((location.href).includes($(this).attr('href')) == true){
            $(this).closest('li').addClass("active")
            console.log($(this).closest('li').parent('ul').attr('id'))
            if($(this).closest('li').parent('ul').hasClass('collapse') == true){
                $('[data-target="#'+$(this).closest('li').parent('ul').attr('id')+'"]').click()
            }
        }
    })
</script>

                