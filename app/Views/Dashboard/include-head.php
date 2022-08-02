<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/theme/assets/images/favicon.png">
  <!--<title>AdminBite admin Template - The Ultimate Multipurpose admin template</title>-->
  <title><?= $page_headline ?></title>

  <!-- Plugins -->
  <link href="<?= base_url() ?>/theme/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/theme/assets/libs/select2/dist/css/select2.min.css">
  <link href="<?= base_url() ?>/theme/assets/libs/toastr/build/toastr.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/theme/assets/libs/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/theme/assets/libs/ckeditor/samples/css/samples.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />

  <!-- Custom CSS -->
  <link href="<?= base_url() ?>/theme/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/theme/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/theme/assets/libs/morris.js/morris.css" rel="stylesheet">

  <!-- Popup CSS -->
  <link href="<?= base_url() ?>/theme/assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="<?= base_url() ?>/theme/dist/css/style.min.css" rel="stylesheet">

  <!-- New Added -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


</head>

<body>

  <!-- ============================================================== -->
  <!-- Preloader -->
  <!-- ============================================================== -->
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>

  <!-- ============================================================== -->
  <!-- Main wrapper -->
  <!-- ============================================================== -->
  <div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header -->
    <!-- ============================================================== -->
    <header class="topbar">
      <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
          <!-- This is for the sidebar toggle which is visible on mobile only -->
          <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
            <i class="ti-menu ti-close"></i>
          </a>
          <!-- ============================================================== -->
          <!-- Logo -->
          <!-- ============================================================== -->
          <?php if ($item = session()->TeacherSession) : ?>
            <a class="navbar-brand" href="<?= base_url('teacher_dashboard') ?>">
            <?php elseif ($item = session()->StudentSession) : ?>
              <a class="navbar-brand" href="<?= base_url('student_dashboard') ?>">
              <?php endif ?>
              <!-- Logo icon -->
              <b class="logo-icon">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img src="<?= base_url() ?>/theme/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                <!-- Light Logo icon -->
                <img src="<?= base_url() ?>/theme/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
              </b>
              <!--End Logo icon -->
              <!-- Logo text -->
              <span class="logo-text">
                <!-- dark Logo text -->
                <img src="<?= base_url() ?>/theme/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                <!-- Light Logo text -->
                <img src="<?= base_url() ?>/theme/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
              </span>
              </a>
              <!-- ============================================================== -->
              <!-- End Logo -->
              <!-- ============================================================== -->
              <!-- ============================================================== -->
              <!-- Toggle which is visible on mobile only -->
              <!-- ============================================================== -->
              <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti-more"></i>
              </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
          <!-- ============================================================== -->
          <!-- toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-left mr-auto">
            <li class="nav-item d-none d-md-block">
              <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                <i class="sl-icon-menu font-20"></i>
              </a>
            </li>
          </ul>
          <!-- ============================================================== -->
          <!-- Right side toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-right">
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <?php if ($item = session()->TeacherSession) : ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php if (!empty($item['image'])) : ?>
                    <img src="<?= base_url() ?>/uploads/teachers/<?= $item['image']; ?>" alt="user" class="rounded-circle" width="31">
                  <?php else : ?>
                    <img src="<?= base_url() ?>/theme/assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31">
                  <?php endif ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                  <span class="with-arrow">
                    <span class="bg-primary"></span>
                  </span>
                  <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                    <div class="">
                      <?php if (!empty($item['image'])) : ?>
                        <img src="<?= base_url() ?>/uploads/teachers/<?= $item['image']; ?>" alt="user" class="img-circle" width="60">
                      <?php else : ?>
                        <img src="<?= base_url() ?>/theme/assets/images/users/1.jpg" alt="user" class="img-circle" width="60">
                      <?php endif ?>
                    </div>
                    <div class="m-l-10">
                      <h4 class="m-b-0"><?= $item['name'] ?></h4>
                      <p class=" m-b-0"><?= $item['email'] ?></p>
                    </div>
                  </div>
                  <a class="dropdown-item" href="<?= base_url('/teacher_profile') ?>">
                    <i class="ti-user m-r-5 m-l-5"></i> My Profile
                  </a>
                  <a class="dropdown-item" href="<?= base_url('/teacher_profile/create') ?>">
                    <i class="ti-pencil m-r-5 m-l-5"></i> Edit My Profile
                  </a>
                  <a class="dropdown-item" href="<?= base_url('/authentication_teacher/logout') ?>">
                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout
                  </a>
                </div>
              </li>
            <?php elseif ($item = session()->StudentSession) : ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php if (!empty($item['image'])) : ?>
                    <img src="<?= base_url() ?>/uploads/students/<?= $item['image']; ?>" alt="user" class="rounded-circle" width="31">
                  <?php else : ?>
                    <img src="<?= base_url() ?>/theme/assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31">
                  <?php endif ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                  <span class="with-arrow">
                    <span class="bg-primary"></span>
                  </span>
                  <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                    <div class="">
                      <?php if (!empty($item['image'])) : ?>
                        <img src="<?= base_url() ?>/uploads/students/<?= $item['image']; ?>" alt="user" class="img-circle" width="60">
                      <?php else : ?>
                        <img src="<?= base_url() ?>/theme/assets/images/users/1.jpg" alt="user" class="img-circle" width="60">
                      <?php endif ?>
                    </div>
                    <div class="m-l-10">
                      <h4 class="m-b-0"><?= $item['name'] ?></h4>
                      <p class=" m-b-0"><?= $item['email'] ?></p>
                    </div>
                  </div>
                  <a class="dropdown-item" href="<?= base_url('/student_dashboard/create') ?>">
                    <i class="ti-pencil m-r-5 m-l-5"></i> Edit My Profile
                  </a>
                  <a class="dropdown-item" href="<?= base_url('/authentication/logout') ?>">
                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout
                  </a>
                </div>
              </li>
            <?php endif; ?>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
          </ul>
        </div>
      </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->