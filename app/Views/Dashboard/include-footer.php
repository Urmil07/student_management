        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->

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
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <script src="<?= base_url() ?>/theme/assets/libs/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="<?= base_url() ?>/theme/assets/libs/popper.js/dist/umd/popper.min.js"></script>
        <script src="<?= base_url() ?>/theme/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- apps -->
        <script src="<?= base_url() ?>/theme/dist/js/app.min.js"></script>
        <script src="<?= base_url() ?>/theme/dist/js/app.init.js"></script>
        <script src="<?= base_url() ?>/theme/dist/js/app-style-switcher.js"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="<?= base_url() ?>/theme/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
        <script src="<?= base_url() ?>/theme/assets/extra-libs/sparkline/sparkline.js"></script>
        <!--Wave Effects -->
        <script src="<?= base_url() ?>/theme/dist/js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="<?= base_url() ?>/theme/dist/js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="<?= base_url() ?>/theme/dist/js/custom.min.js"></script>
        <script src="<?= base_url() ?>/theme/assets/libs/toastr/build/toastr.min.js"></script>
        <script src="<?= base_url() ?>/theme/assets/extra-libs/toastr/toastr-init.js"></script>

        <!--This page JavaScript -->
        <script src="<?= base_url() ?>/theme/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
        <script src="<?= base_url() ?>/theme/assets/libs/magnific-popup/meg.init.js"></script>
        <script src="<?= base_url() ?>/theme/assets/libs/select2/dist/js/select2.full.min.js"></script>
        <script src="<?= base_url() ?>/theme/assets/libs/select2/dist/js/select2.min.js"></script>
        <script src="<?= base_url() ?>/theme/dist/js/pages/forms/select2/select2.init.js"></script>
        <script src="<?= base_url() ?>/theme/assets/libs/ckeditor/ckeditor.js"></script>
        <script src=" <?= base_url() ?>/theme/assets/libs/ckeditor/samples/js/sample.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
        <script src="<?= base_url() ?>/theme/assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
        <script src="<?= base_url() ?>/theme/dist/js/pages/forms/mask/mask.init.js"></script>

        <!--chartis chart-->
        <script src="<?= base_url() ?>/theme/assets/libs/chartist/dist/chartist.min.js"></script>
        <script src="<?= base_url() ?>/theme/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
        <!--c3 charts -->
        <script src="<?= base_url() ?>/theme/assets/extra-libs/c3/d3.min.js"></script>
        <script src="<?= base_url() ?>/theme/assets/extra-libs/c3/c3.min.js"></script>
        <!--chartjs -->
        <script src="<?= base_url() ?>/theme/assets/libs/raphael/raphael.min.js"></script>
        <script src="<?= base_url() ?>/theme/assets/libs/morris.js/morris.min.js"></script>

        <script src="<?= base_url() ?>/theme/dist/js/pages/dashboards/dashboard1.js"></script>
        <!--This page plugins -->
        <script src="<?= base_url() ?>/theme/assets/extra-libs/DataTables/datatables.min.js"></script>
        <!-- start - This is for export functionality only -->
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
        <script src="<?= base_url() ?>/theme/dist/js/pages/datatable/datatable-advanced.init.js"></script>

        <!-- New Added -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>

        </body>

        </html>