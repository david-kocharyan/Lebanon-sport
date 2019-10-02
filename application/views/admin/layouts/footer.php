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
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="<?= base_url('public/') ?>plugins/bower_components/jquery/dist/jquery.min.js"></script>
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
});
</script>
<!--Wave Effects -->
<script src="<?= base_url('public/') ?>js/waves.js"></script>
<!--Morris JavaScript -->
<script src="<?= base_url('public/') ?>plugins/bower_components/raphael/raphael-min.js"></script>
<script src="<?= base_url('public/') ?>plugins/bower_components/morrisjs/morris.js"></script>
<!-- chartist chart -->
<script src="<?= base_url('public/') ?>plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
<script src="<?= base_url('public/') ?>plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
<!-- Calendar JavaScript -->
<script src="<?= base_url('public/') ?>plugins/bower_components/moment/moment.js"></script>
<script src='<?= base_url('public/') ?>plugins/bower_components/calendar/dist/fullcalendar.min.js'></script>
<script src="<?= base_url('public/') ?>plugins/bower_components/calendar/dist/cal-init.js"></script>
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


</body>

</html>
