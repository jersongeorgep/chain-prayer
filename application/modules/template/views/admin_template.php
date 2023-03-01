<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= config_item('app_name'); ?> | <?= $page_title; ?></title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= site_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- IonIcons -->
  <link rel="stylesheet" href="<?= site_url('assets/plugins/ionicons/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= site_url('assets/dist/css/adminlte.min.css'); ?>">
  <script>
    var base_url = "<?= site_url(); ?>";
  </script>
  <!-- jQuery -->
  <script src="<?= site_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= site_url('assets/plugins/toastr/toastr.min.css'); ?>">
  <!-- Toastr -->
  <script src="<?= site_url('assets/plugins/toastr/toastr.min.js'); ?>"></script>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php $this->load->view('common/top_navbar'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php $this->load->view('common/left_sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php $this->load->view('common/breadcrumb'); ?>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <?php $this->load->view($load_page); ?>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
 <?php $this->load->view('common/footer'); ?>
</div>
<!-- ./wrapper -->
<?php $this->load->view('common/modal'); ?>
<?php $this->load->view('common/messages'); ?>
<!-- REQUIRED SCRIPTS -->

<!-- Bootstrap -->
<script src="<?= site_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- AdminLTE -->
<script src="<?= site_url('assets/dist/js/adminlte.js'); ?>"></script>

<!-- OPTIONAL SCRIPTS -->
<!-- AdminLTE for demo purposes -->
<script src="<?= site_url('assets/dist/js/demo.js'); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
</body>
</html>
