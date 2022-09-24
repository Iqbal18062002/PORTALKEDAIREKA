
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/logo.jpg">

    <title>Student Grading System</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/css/style.css" rel="stylesheet">
    <link href="asset/css/styles.css" rel="stylesheet">
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="asset/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.js"></script>
    <style>
      @font-face {
        font-family: mon;
        src: url('fonts/Montserrat-Bold.ttf');
      }
      *{
        font-family:mon !important;
      }
      body{
        display: flex;
        height: calc(100%);
        width: calc(100%);
        justify-content: center;
        align-items: center;
      }

      .sidenav li a{
        font-family: mon;
      }
      .login-form{
        display: block;
        position: fixed;
        border:1px solid;
        border-color: #AA0000;
        border-radius: 20px;
        padding: 30px;

      }
      .hd{
        color:#7E0000;border:none;font-size:30px;margin-bottom:50px;
      }
    </style>
  </head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#AA0000 !important;">
      <div class="container-fluid">
        <div class="navbar-header">
          <div class="container">
          <div class="col-md-1 text-right">
          <img src="logo.jpeg" class="lg_img" alt="">
          </div>
          <div class="col-md-8">
          <H3 style="color:white;valign:center"><p style="margin-bottom:0px;font-size:25px">Portal</p><p style="font-size:22px">Harum Sentosa Baru</p></H3>
        </div>
        
        </div>
        </div>
      </div>
    </nav>

<div class="container-fluid" >

  <div class="login-form back" id="login_modal" role="dialog" style="background-image:url(logo_trans.png);background-size:400px;background-repeat:no-repeat;background-position:center;">


  <center><h3 class="hd"><b>LOGIN</b></h3></center>
  
  

  <form class="form-horizontal" method="post" >
    <div class="form-group lg_text">
      <label class="control-label col-sm-2" for="user">Username</label>
      <div class="col-md-10">
      <div class="input-group lg_in">
        <input type="text" class="form-control ans" id="user" name="user" placeholder="Enter Username" autocomplete="off">
      </div>
      </div>
    </div>
    <div class="form-group lg_text">
      <label class="control-label col-sm-2" for="pwd">Password</label>
      <div class="col-md-10"  >
      <div class="input-group lg_in">
          
        <input type="password" class="form-control ans" id="pwd" name="pwd" placeholder="Enter password">
      </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-md-offset-5  col-md-12 tbl" >
      <!--<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Create New</button>-->
        <button type="hidden"  class="btn st_edit" >Masuk</button>
       
      </div>
    </div>
  </form>
   <?php
  include 'connect.php';
  ?>
   </div>          
</div>


    <script src="assets/js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  
</html>
