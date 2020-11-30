<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>/themes/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>/themes/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/themes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>/themes/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>/themes/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>/themes/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>/themes/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>/themes/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/themes/dist/js/adminlte.js"></script>
<?= $this->renderSection('custom_js') ?>
</body>

</html>