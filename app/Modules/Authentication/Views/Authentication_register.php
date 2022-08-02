        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(<?= base_url() ?>/theme/assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box">
                <div>
                    <div class="logo">
                        <span class="db"><img src="<?= base_url() ?>/theme/assets/images/logo-icon.png" alt="logo" /></span>
                        <h5 class="font-medium m-b-20">Sign Up to Student Dashboard</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="needs-validation" method="POST" action="" novalidate>
                                <div class="form-group row ">
                                    <div class="col-12 ">
                                        <input class="form-control form-control-lg" type="text" id="name" name="name" placeholder="Name" required>
                                        <div class="invalid-tooltip">
                                            Please Enter Your Name.
                                        </div>
                                        <?php if (isset($validation)) : ?>
                                            <small class="text-danger"><?= $validation->getError('name') ?></small>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <div class="col-12 ">
                                        <input class="form-control form-control-lg" type="email" id="email" name="email" placeholder="Email" required>
                                        <div class="invalid-tooltip">
                                            Please Enter Your Email Address.
                                        </div>
                                        <?php if (isset($validation)) : ?>
                                            <small class="text-danger"><?= $validation->getError('email') ?></small>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <div class="col-12 ">
                                        <input class="form-control form-control-lg" type="password" id="password" name="password" placeholder="Password" required>
                                        <div class="invalid-tooltip">
                                            Please Enter Your Password.
                                        </div>
                                        <?php if (isset($validation)) : ?>
                                            <small class="text-danger"><?= $validation->getError('password') ?></small>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <div class="col-12 ">
                                        <input class="form-control form-control-lg" type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                                        <div class="invalid-tooltip">
                                            Please Enter Your Confirm Password.
                                        </div>
                                        <?php if (isset($validation)) : ?>
                                            <small class="text-danger"><?= $validation->getError('confirm_password') ?></small>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12 ">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck" required>
                                            <label class="custom-control-label" for="customCheck">I agree to all <a href="javascript:void(0)">Terms</a></label>
                                            <div class="invalid-tooltip">
                                                Please agree to all terms .
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center ">
                                    <div class="col-xs-12 p-b-20 ">
                                        <button class="btn btn-block btn-lg btn-info " value="submit" name="submit" id="submit" type="submit ">SIGN UP</button>
                                    </div>
                                </div>
                                <div class="form-group m-b-0 m-t-10 ">
                                    <div class="col-sm-12 text-center ">
                                        Already have an account? <a href="<?=base_url()?>" class="text-info m-l-5 "><b>Sign In</b></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->


        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        // alert(form);return false;
                        form.addEventListener('submit', function(event) {

                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>