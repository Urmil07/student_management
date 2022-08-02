<?php

use App\Models\CommonModel;
?>
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- ============================================================== -->
        <!-- col no. 1 -->
        <!-- ============================================================== -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="m-t-25" id="form" method="POST" action="<?= base_url('student_dashboard/create') ?>" enctype="multipart/form-data">
                        <div class="form-group col-md-12">
                            <label>Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="<?= $name ?>">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Email</label>
                            <input class="form-control" type="email" id="email" name="email" value="<?= $email ?>">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Age</label>
                            <input type="text" name="age" id="age" class="form-control" value="<?= $age ?>">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Address</label>
                            <textarea name="address" id="address" rows="15" class="ckeditor" placeholder="Address Here...">
                                            <?= $address ?>
                                        </textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Standard</label>
                            <input type="text" name="standard" id="standard" class="form-control" value="<?= $standard ?>" readonly>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Grades</label>
                            <input class="form-control" type="text" id="grades" name="grades" value="<?= $grades ?>" readonly>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Password</label>
                            <input class="form-control" type="password" id="password" name="password">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Confirm Password</label>
                            <input class="form-control" type="password" id="confirm_password" name="confirm_password">
                        </div>
                        <div class="form-group input-group col-md-12">
                            <button type="button" class="btn btn-info"><i class="ti-import text-white"></i></button>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose Student Image</label>
                            </div>
                        </div>
                        <?php if (!empty($image)) : ?>
                            <div class="form-group col-md-12">
                                <label>Current Student Image</label>
                                <div class="el-card-avatar el-overlay-1 mb-2 ml-2">
                                    <img src="<?= base_url() ?>/uploads/students/<?= $image; ?>" height="85px" width="95px" alt="Image" />
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="form-actions">
                            <div class="card-body">
                                <button type="submit" name="submit" value="Submit" class="btn btn-success submit"> <i class="fa fa-check"></i> Save</button>
                                <a href="<?= base_url('student_dashboard') ?>" class="btn btn-dark">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->

<script>
    if ($("#form").length > 0) {
        $("#form").validate({
            rules: {
                confirm_password: {
                    equalTo: "#password"
                }
            },
            messages: {
                confirm_password: {
                    required: "Enter Confirm Password",
                }
            }
        })
    }
</script>