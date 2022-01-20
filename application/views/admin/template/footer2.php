<!-- /.content -->
<!-- /.content -->
</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="container">
        <div class="pull-right hidden-xs">
            <b>created by</b> <a href="https://www.instagram.com/pebriandhidjabar/">Nyahui</a>
        </div>
        <strong>Copyright &copy; 2021 <a href="https://www.instagram.com/iconplus_kalteng/?hl=id">Icon+
                Kalteng</a>.</strong> All rights
        reserved.
    </div>
    <!-- /.container -->
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url('assets/') ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url('assets/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/') ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>


<!-- Select2 -->
<script src="<?= base_url('assets/') ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?= base_url('assets/') ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
</script>
<!-- Page script -->

<script>
$(function() {
    //Initialize Select2 Elements
    $('.select2').select2({
        statesave: true,
        responsive: true,
        processing: true,
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
    })

    $('.select3').select2()
    $('.select4').select2()
    $('.select5').select2()
    $('.select6').select2()
    $('.select7').select2()
    //Date picker
    $('#datepicker').datepicker({
        autoclose: true
    })
    $('#datepicker1').datepicker({
        autoclose: true
    })
})
</script>
<!-- DataTables -->
<script src="<?= base_url('assets/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
<!-- FLASHDATA-->
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="<?= base_url('assets') ?>/dist/js/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets') ?>/dist/js/myscript.js"></script>
<script>
$(document).ready(function() {
    var table = $('#example3').DataTable({
        responsive: true
    });

    new $.fn.dataTable.FixedHeader(table);
});
</script>

<script>
$(function() {
    $('#example').DataTable()
    $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false,
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true,
    })

})
var table = new DataTable("table", {
    fixedHeight: true,
    fixedColumns: true
});
</script>
<!-- ChartJS -->
<script src="<?= base_url('assets/') ?>bower_components/chart.js/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<!-- JAVASCRIPT UNTUK CHART DASHBOARD -->
<script>
$(function() {
    //get the bar chart canvas
    var cData = JSON.parse(`<?php echo $chart_data; ?>`);
    var ctx = $("#bar-chart");
    //bar chart data
    var data = {
        labels: cData.label,
        datasets: [{
            label: cData.label,
            data: cData.data,
            backgroundColor: [
                "#DEB887",
                "#A9A9A9",
                "#DC143C",
                "#F4A460",
                "#2E8B57",
                "#1D7A46",
                "#CDA776",
                "#CDA776",
                "#989898",
                "#CB252B",
                "#E39371",
            ],
            borderColor: [
                "#CDA776",
                "#989898",
                "#CB252B",
                "#E39371",
                "#1D7A46",
                "#F4A460",
                "#CDA776",
                "#DEB887",
                "#A9A9A9",
                "#DC143C",
                "#F4A460",
                "#2E8B57",
            ],
            borderWidth: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
        }]
    };
    //options
    var options = {
        responsive: true,
        title: {
            display: true,
            position: "top",
            text: cData.title,
            fontSize: 12,
            fontColor: "#111"
        },
        legend: {
            display: true,
            position: "bottom",
            labels: {
                fontColor: "#333",
                fontSize: 12
            }
        }
    };
    //create bar Chart class object
    var chart1 = new Chart(ctx, {
        type: "pie",
        data: data,
        options: options
    });

});
</script>
</body>

</html>