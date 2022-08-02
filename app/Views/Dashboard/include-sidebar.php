    <!-- ============================================================== -->
    <!-- Left Sidebar -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <!-- User Profile-->
                    <li>
                        <!-- User Profile-->
                        <div class="user-profile dropdown m-t-20">
                            <?php if ($item = session()->TeacherSession) : ?>
                                <div class="user-pic">
                                    <?php if (!empty($item['image'])) : ?>
                                        <img src="<?= base_url() ?>/uploads/teachers/<?= $item['image']; ?>" alt="users" class="rounded-circle img-fluid" />
                                    <?php else : ?>
                                        <img src="<?= base_url() ?>/theme/assets/images/users/1.jpg" alt="users" class="rounded-circle img-fluid" />
                                    <?php endif ?>
                                </div>
                            <?php elseif ($item = session()->StudentSession) : ?>
                                <div class="user-pic">
                                    <?php if (!empty($item['image'])) : ?>
                                        <img src="<?= base_url() ?>/uploads/students/<?= $item['image']; ?>" alt="users" class="rounded-circle img-fluid" />
                                    <?php else : ?>
                                        <img src="<?= base_url() ?>/theme/assets/images/users/1.jpg" alt="users" class="rounded-circle img-fluid" />
                                    <?php endif ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($item = session()->TeacherSession) : ?>
                                <div class="user-content hide-menu m-t-10">
                                    <h5 class="m-b-10 user-name font-medium"><?= $item['name'] ?></h5>
                                    <a href="<?= base_url('/authentication_teacher/logout') ?>" title="Logout" class="btn btn-circle btn-sm">
                                        <i class="ti-power-off"></i>
                                    </a>
                                </div>
                            <?php elseif ($item = session()->StudentSession) : ?>
                                <div class="user-content hide-menu m-t-10">
                                    <h5 class="m-b-10 user-name font-medium"><?= $item['name'] ?></h5>
                                    <a href="<?= base_url('/authentication/logout') ?>" title="Logout" class="btn btn-circle btn-sm">
                                        <i class="ti-power-off"></i>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- End User Profile-->
                    </li>

                    <li class="nav-small-cap">
                        <i class="mdi mdi-dots-horizontal"></i>
                        <span class="hide-menu">Apps</span>
                    </li>
                    <?php if ($item = session()->TeacherSession) : ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('teacher_dashboard') ?>" aria-expanded="false">
                                <i class="icon-Car-Wheel"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                    <?php elseif ($item = session()->StudentSession) : ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('student_dashboard') ?>" aria-expanded="false">
                                <i class="icon-Car-Wheel"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar -->
    <!-- ============================================================== -->




    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title"><?= $page_title ?></h4>
                    <div class="d-flex align-items-center"></div>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex no-block justify-content-end align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <?php if ($item = session()->TeacherSession) : ?>
                                        <a href="<?= base_url('teacher_dashboard') ?>">Home</a>
                                    <?php elseif ($item = session()->StudentSession) : ?>
                                        <a href="<?= base_url('student_dashboard') ?>">Home</a>
                                    <?php endif ?>
                                </li>
                                <!-- <li class="breadcrumb-item active" aria-current="page"><?= $page_title ?></li> -->
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->