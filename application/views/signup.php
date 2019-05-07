<!DOCTYPE html>
<html lang="en">

<head>

  <title>Library Management System</title>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>">
  <!-- Custom styles-->
  <link rel="stylesheet" href="<?php echo base_url('assets/custom.css'); ?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/fontawesome/css/all.css'); ?>">


</head>

<body>

  <div class="header">
    <h1>Library Management System</h1>
  </div>


  <div class="row">

    <div class="login-form">
      <form role="form" method="POST" action="<?php echo base_url('signup'); ?> ">
        <h2 class="text-center">Signup</h2>
        <div class="form-group">
          <input type="username" class="form-control" placeholder="Username" name="username" required autofocus>
        </div>
        <div class="form-group">
          <input type="fName" class="form-control" placeholder="First Name" name="fName" required autofocus>
        </div>
        <div class="form-group">
          <input type="lName" class="form-control" placeholder="Last Name" name="lName" required autofocus>
        </div>

        <div class="form-group">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Confirm Password" name="conpassword" required>
        </div>

        <div class="form-group">

          <div class="text-danger"><b>
            <?php
            if ($this->session->flashdata('error_messages')) {
              echo $this->session->flashdata('error_messages');
            } 
            ?>
          </b></div>


          <button type="submit" class="btn btn-primary btn-block">Signup</button>
        </div>       
      </form>
      <p class="text-center"><a href="<?php echo base_url('login'); ?>">Login</a></p>
    </div>

    <div class="footer">
      <span>Copyright
        &copy; Library Management System
        <script>
          document.write(new Date().getFullYear())
        </script>.
      </span>
    </div>

    <script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery-3.4.1.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>

  </body>
  </html>
