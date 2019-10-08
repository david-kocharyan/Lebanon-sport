</div>
<!-- /.container-fluid -->
<footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by themedesigner.in </footer>
</div>
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->

<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url('public/') ?>bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?= base_url('public/') ?>plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--slimscroll JavaScript -->
<script src="<?= base_url('public/') ?>js/jquery.slimscroll.js"></script>
<!--Select 2 -->
<script src="<?= base_url('public/') ?>plugins/bower_components/select2/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.select_2_example').select2();
    $(".select2-multiple").select2({
        tags: true
    });
});
</script>
<!--Wave Effects -->
<script src="<?= base_url('public/') ?>js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?= base_url('public/') ?>js/custom.min.js"></script>
<!-- Custom tab JavaScript -->
<script src="<?= base_url('public/') ?>js/cbpFWTabs.js"></script>
<script type="text/javascript">
    (function() {
        [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
            new CBPFWTabs(el);
        });
    })();
</script>
<script src="<?= base_url('public/') ?>plugins/bower_components/toast-master/js/jquery.toast.js"></script>
<!--Style Switcher -->
<script src="<?= base_url('public/') ?>plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>

<script src="<?= base_url('public/') ?>js/custom.min.js"></script>
<script src="<?= base_url('public/') ?>plugins/bower_components/datatables/datatables.min.js"></script>
<script src="<?= base_url('public/') ?>plugins/bower_components/dropify/dist/js/dropify.min.js"></script>

<script>
    $(document).ready(function() {
		// data table
        $('#myTable').DataTable();

        // Basic
        $('.dropify').dropify();
    })
</script>

<!-- Date Picker Plugin JavaScript -->
<script src="<?= base_url('public/') ?>plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- Date range Plugin JavaScript -->
<script src="<?= base_url('public/') ?>plugins/bower_components/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?= base_url('public/') ?>plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<script>
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
    });
</script>

</body>
</html>
