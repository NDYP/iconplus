<!-- /.content -->
<!-- /.content -->
</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="container">
        <div class="pull-right hidden-xs">
            <b>created by</b> <a href="https://www.instagram.com/nyahuidjabar/">Nyahui</a>
        </div>
        <strong>Copyright &copy; 2021 <a href="https://www.instagram.com/iconplus_kalteng/?hl=id">PLN ICON+ KP
                KALTENG</a>.</strong> All rights
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
        autoclose: true,
        dateFormat: 'dd-mm-yyyy'
    })
    $('#datepicker1').datepicker({
        autoclose: true,
        dateFormat: 'dd-mm-yyyy'
    })
})
</script>
<script>
$(document).ready(function() {
    $("input").attr("autocomplete", "off");
});
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
        responsive: true,
        searching: false,
        paging: false,
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
    });
    new $.fn.dataTable.FixedHeader(table);

})
var table = new DataTable("#mytable", {
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
    var cData1 = JSON.parse(`<?php echo $chart_data1; ?>`);
    var cData2 = JSON.parse(`<?php echo $chart_data2; ?>`);
    var ctx = $("#bar-chart2");
    //bar chart data
    var data = {
        labels: cData1.label,
        datasets: [{
                label: 'TUR (%)',
                data: cData2.tur,
                backgroundColor: "#FF0000",
                // [
                //     "#FF0000",
                //     "#00FFFF",
                //     "#0000FF",
                //     "#00008B",
                //     "#ADD8E6",
                //     "#800080",
                //     "#FFFF00",
                //     "#00FF00",
                //     "#FF00FF",
                //     "#FFC0CB",

                //     "#C0C0C0",
                //     "#808080",
                //     "#000000",
                //     "#FFA500",
                //     "#A52A2A",
                //     "#800000",
                //     "#008000",
                //     "#808000",
                //     "#7FFD4",

                // ],
                borderColor: "#FF0000",
                // [
                //     "#FF0000",
                //     "#00FFFF",
                //     "#0000FF",
                //     "#00008B",
                //     "#ADD8E6",
                //     "#800080",
                //     "#FFFF00",
                //     "#00FF00",
                //     "#FF00FF",
                //     "#FFC0CB",

                //     "#C0C0C0",
                //     "#808080",
                //     "#000000",
                //     "#FFA500",
                //     "#A52A2A",
                //     "#800000",
                //     "#008000",
                //     "#808000",
                //     "#7FFD4",
                // ],
                borderWidth: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
            },
            {
                label: 'HP',
                data: cData2.hp,
                backgroundColor: "#00FFFF",
                // [
                //     "#FF0000",
                //     "#00FFFF",
                //     "#0000FF",
                //     "#00008B",
                //     "#ADD8E6",
                //     "#800080",
                //     "#FFFF00",
                //     "#00FF00",
                //     "#FF00FF",
                //     "#FFC0CB",

                //     "#C0C0C0",
                //     "#808080",
                //     "#000000",
                //     "#FFA500",
                //     "#A52A2A",
                //     "#800000",
                //     "#008000",
                //     "#808000",
                //     "#7FFD4",

                // ],
                borderColor: "#00FFFF",
                // [
                //     "#FF0000",
                //     "#00FFFF",
                //     "#0000FF",
                //     "#00008B",
                //     "#ADD8E6",
                //     "#800080",
                //     "#FFFF00",
                //     "#00FF00",
                //     "#FF00FF",
                //     "#FFC0CB",

                //     "#C0C0C0",
                //     "#808080",
                //     "#000000",
                //     "#FFA500",
                //     "#A52A2A",
                //     "#800000",
                //     "#008000",
                //     "#808000",
                //     "#7FFD4",
                // ],
                borderWidth: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
            },
            {
                label: 'HC',
                data: cData1.hc,
                backgroundColor: "#0000FF",
                // [
                //     "#FF0000",
                //     "#00FFFF",
                //     "#0000FF",
                //     "#00008B",
                //     "#ADD8E6",
                //     "#800080",
                //     "#FFFF00",
                //     "#00FF00",
                //     "#FF00FF",
                //     "#FFC0CB",

                //     "#C0C0C0",
                //     "#808080",
                //     "#000000",
                //     "#FFA500",
                //     "#A52A2A",
                //     "#800000",
                //     "#008000",
                //     "#808000",
                //     "#7FFD4",

                // ],
                borderColor: "#0000FF",
                // [
                //     "#FF0000",
                //     "#00FFFF",
                //     "#0000FF",
                //     "#00008B",
                //     "#ADD8E6",
                //     "#800080",
                //     "#FFFF00",
                //     "#00FF00",
                //     "#FF00FF",
                //     "#FFC0CB",

                //     "#C0C0C0",
                //     "#808080",
                //     "#000000",
                //     "#FFA500",
                //     "#A52A2A",
                //     "#800000",
                //     "#008000",
                //     "#808000",
                //     "#7FFD4",
                // ],
                borderWidth: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
            },
            {
                label: 'FAT Aktif',
                data: cData2.fat_aktif,
                backgroundColor: "#00008B",
                // [
                //     "#FF0000",
                //     "#00FFFF",
                //     "#0000FF",
                //     "#00008B",
                //     "#ADD8E6",
                //     "#800080",
                //     "#FFFF00",
                //     "#00FF00",
                //     "#FF00FF",
                //     "#FFC0CB",

                //     "#C0C0C0",
                //     "#808080",
                //     "#000000",
                //     "#FFA500",
                //     "#A52A2A",
                //     "#800000",
                //     "#008000",
                //     "#808000",
                //     "#7FFD4",

                // ],
                borderColor: "#00008B",
                // [
                //     "#FF0000",
                //     "#00FFFF",
                //     "#0000FF",
                //     "#00008B",
                //     "#ADD8E6",
                //     "#800080",
                //     "#FFFF00",
                //     "#00FF00",
                //     "#FF00FF",
                //     "#FFC0CB",

                //     "#C0C0C0",
                //     "#808080",
                //     "#000000",
                //     "#FFA500",
                //     "#A52A2A",
                //     "#800000",
                //     "#008000",
                //     "#808000",
                //     "#7FFD4",
                // ],
                borderWidth: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
            }
        ]
    };
    //options
    var options = {
        responsive: true,
        title: {
            display: true,
            position: "top",
            text: cData1.title,
            fontSize: 10,
            fontColor: "#111"
        },
        legend: {
            display: true,
            position: "top",
            labels: {
                fontColor: "#000000",
                fontSize: 10
            }
        }
    };
    //create bar Chart class object
    var chart1 = new Chart(ctx, {
        type: "bar",
        data: data,
        options: options
    });

});
</script>
<script>
$(function() {
    //get the bar chart canvas
    var cData1 = JSON.parse(`<?php echo $chart_data4; ?>`);
    var cData2 = JSON.parse(`<?php echo $chart_data5; ?>`);
    var ctx = $("#bar-chart");
    //bar chart data
    var data = {
        labels: cData1.label,
        datasets: [{
                label: 'TUR (%)',
                data: cData2.tur,
                backgroundColor: "#FF0000",
                // [
                //     "#FF0000",
                //     "#00FFFF",
                //     "#0000FF",
                //     "#00008B",
                //     "#ADD8E6",
                //     "#800080",
                //     "#FFFF00",
                //     "#00FF00",
                //     "#FF00FF",
                //     "#FFC0CB",

                //     "#C0C0C0",
                //     "#808080",
                //     "#000000",
                //     "#FFA500",
                //     "#A52A2A",
                //     "#800000",
                //     "#008000",
                //     "#808000",
                //     "#7FFD4",

                // ],
                borderColor: "#FF0000",
                // [
                //     "#FF0000",
                //     "#00FFFF",
                //     "#0000FF",
                //     "#00008B",
                //     "#ADD8E6",
                //     "#800080",
                //     "#FFFF00",
                //     "#00FF00",
                //     "#FF00FF",
                //     "#FFC0CB",

                //     "#C0C0C0",
                //     "#808080",
                //     "#000000",
                //     "#FFA500",
                //     "#A52A2A",
                //     "#800000",
                //     "#008000",
                //     "#808000",
                //     "#7FFD4",
                // ],
                borderWidth: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
            },
            {
                label: 'HP',
                data: cData2.hp,
                backgroundColor: "#00FFFF",
                // [
                //     "#FF0000",
                //     "#00FFFF",
                //     "#0000FF",
                //     "#00008B",
                //     "#ADD8E6",
                //     "#800080",
                //     "#FFFF00",
                //     "#00FF00",
                //     "#FF00FF",
                //     "#FFC0CB",

                //     "#C0C0C0",
                //     "#808080",
                //     "#000000",
                //     "#FFA500",
                //     "#A52A2A",
                //     "#800000",
                //     "#008000",
                //     "#808000",
                //     "#7FFD4",

                // ],
                borderColor: "#00FFFF",
                // [
                //     "#FF0000",
                //     "#00FFFF",
                //     "#0000FF",
                //     "#00008B",
                //     "#ADD8E6",
                //     "#800080",
                //     "#FFFF00",
                //     "#00FF00",
                //     "#FF00FF",
                //     "#FFC0CB",

                //     "#C0C0C0",
                //     "#808080",
                //     "#000000",
                //     "#FFA500",
                //     "#A52A2A",
                //     "#800000",
                //     "#008000",
                //     "#808000",
                //     "#7FFD4",
                // ],
                borderWidth: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
            },
            {
                label: 'HC',
                data: cData1.hc,
                backgroundColor: "#0000FF",
                // [
                //     "#FF0000",
                //     "#00FFFF",
                //     "#0000FF",
                //     "#00008B",
                //     "#ADD8E6",
                //     "#800080",
                //     "#FFFF00",
                //     "#00FF00",
                //     "#FF00FF",
                //     "#FFC0CB",

                //     "#C0C0C0",
                //     "#808080",
                //     "#000000",
                //     "#FFA500",
                //     "#A52A2A",
                //     "#800000",
                //     "#008000",
                //     "#808000",
                //     "#7FFD4",

                // ],
                borderColor: "#0000FF",
                // [
                //     "#FF0000",
                //     "#00FFFF",
                //     "#0000FF",
                //     "#00008B",
                //     "#ADD8E6",
                //     "#800080",
                //     "#FFFF00",
                //     "#00FF00",
                //     "#FF00FF",
                //     "#FFC0CB",

                //     "#C0C0C0",
                //     "#808080",
                //     "#000000",
                //     "#FFA500",
                //     "#A52A2A",
                //     "#800000",
                //     "#008000",
                //     "#808000",
                //     "#7FFD4",
                // ],
                borderWidth: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
            },
            {
                label: 'FAT Aktif',
                data: cData2.fat_aktif,
                backgroundColor: "#00008B",
                // [
                //     "#FF0000",
                //     "#00FFFF",
                //     "#0000FF",
                //     "#00008B",
                //     "#ADD8E6",
                //     "#800080",
                //     "#FFFF00",
                //     "#00FF00",
                //     "#FF00FF",
                //     "#FFC0CB",

                //     "#C0C0C0",
                //     "#808080",
                //     "#000000",
                //     "#FFA500",
                //     "#A52A2A",
                //     "#800000",
                //     "#008000",
                //     "#808000",
                //     "#7FFD4",

                // ],
                borderColor: "#00008B",
                // [
                //     "#FF0000",
                //     "#00FFFF",
                //     "#0000FF",
                //     "#00008B",
                //     "#ADD8E6",
                //     "#800080",
                //     "#FFFF00",
                //     "#00FF00",
                //     "#FF00FF",
                //     "#FFC0CB",

                //     "#C0C0C0",
                //     "#808080",
                //     "#000000",
                //     "#FFA500",
                //     "#A52A2A",
                //     "#800000",
                //     "#008000",
                //     "#808000",
                //     "#7FFD4",
                // ],
                borderWidth: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
            }
        ]
    };
    //options
    var options = {
        responsive: true,
        title: {
            display: true,
            position: "top",
            text: cData1.title,
            fontSize: 10,
            fontColor: "#111"
        },
        legend: {
            display: true,
            position: "top",
            labels: {
                fontColor: "#000000",
                fontSize: 10
            }
        }
    };
    //create bar Chart class object
    var chart1 = new Chart(ctx, {
        type: "bar",
        data: data,
        options: options
    });

});
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.min.js"
    integrity="sha512-rcWQG55udn0NOSHKgu3DO5jb34nLcwC+iL1Qq6sq04Sj7uW27vmYENyvWm8I9oqtLoAE01KzcUO6THujRpi/Kg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.js"
    integrity="sha512-JjkQxXsZ8GMTLe9DUkPrx7J2c+LHkgdiG5KnC8SAcH98s6whNCmf7WB8EbUI9GmkjIPdtGrXTFkuyidNAPfZeA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#y").chained("#x");
});
</script>
</body>

</html>