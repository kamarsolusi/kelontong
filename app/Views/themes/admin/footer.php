<!-- SweetAlert2 -->
<script src="<?= base_url() ?>/themes/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/themes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/themes/dist/js/adminlte.js"></script>
<script src="<?= base_url() ?>/themes/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>/themes/plugins/daterangepicker/daterangepicker.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>/themes/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/themes/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Dropzone -->
<script type="text/javascript" src="<?= base_url('themes') ?>/dist/js/dropzone.min.js"></script>
<?php $request = \Config\Services::request(); ?>
<?php if($request->uri->getSegment(2)=='categories'): ?>
    <script src="<?= base_url() ?>/src/js/categories.js"></script>
<?php elseif($request->uri->getSegment(2)=='products'): ?>
    <script src="<?= base_url() ?>/src/js/products.min.js"></script>
<?php endif; ?>
</body>

</html>