<script>
    <?php if (session()->getFlashdata('message')) : ?>
        window.onload = function() {
            toastr.success('<?= session()->getFlashdata('message') ?>');
        };
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        window.onload = function() {
            toastr.error('<?= session()->getFlashdata('error') ?>');
        };
    <?php endif; ?>

    <?php if (session()->getFlashdata('info')) : ?>
        window.onload = function() {
            toastr.info('<?= session()->getFlashdata('info') ?>');
        };
    <?php endif; ?>
</script>
<!-- ============================================================== -->
<!-- All Required js -->
<!-- ============================================================== -->
<script src="<?=base_url()?>/theme/assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?=base_url()?>/theme/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="<?=base_url()?>/theme/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="<?=base_url()?>/theme/assets/libs/toastr/build/toastr.min.js"></script>
<script src="<?=base_url()?>/theme/assets/extra-libs/toastr/toastr-init.js"></script>

<!-- jquery Validation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
<!-- ============================================================== -->
<!-- This page plugin js -->
<!-- ============================================================== -->
<script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
</script>
</body>

</html>