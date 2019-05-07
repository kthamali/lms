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
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.min.css'); ?>"/>
  <script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery-3.4.1.min.js');?>"></script>


</head>

<body>

  <div class="header">
    <h1>Library Management System</h1>
  </div>

  <div class="navbar">
    <a class="navbar-brand mr-1" href="<?php echo base_url('dashboard'); ?>">LMS</a>

    <a class="navbar" href="<?php echo base_url('login/logout'); ?>">
      <i class="fas fa-user"> Logout</i>
    </a>

  </div>



  <div class="row">

    <div class="side">
      <!-- Left Menu -->
      <?php $this->load->view('layout/left_menu'); ?>
    </div>

    <div class="main">
      <div class="row" style="height: calc(88vh);">
        <div class="col-lg-12">
          <!-- Right Manu -->
          <?php echo $sub_view; ?>

        </div>
      </div>

    </div>
  </div>

  <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/DataTables/datatables.min.js'); ?>"></script>

</body>
</html>
