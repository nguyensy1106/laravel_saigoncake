
<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('admin/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
<!---->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<!---->
<script type="text/javascript">
  let status_transaction = $("#container").attr('data-json');
  status_transaction = JSON.parse(status_transaction);
  console.log(status_transaction);

  let listDay = $("#container2").attr('data-list-day');
  listDay = JSON.parse(listDay);
  console.log(listDay);

  let arrtransactionMonth = $("#container2").attr('data-money');
  arrtransactionMonth = JSON.parse(arrtransactionMonth);
  console.log(arrtransactionMonth);

  let arrtotalOrderInMonth = $("#container2").attr('data-order');
  arrtotalOrderInMonth = JSON.parse(arrtotalOrderInMonth);
  console.log(arrtotalOrderInMonth);
  
  Highcharts.chart('container', {
      chart: {
         styledModel: true
      },

      title: {
          text: 'Thống Kê Trạng Thái Đơn Hàng'
      },

      series: [{
        type: 'pie',
        name: 'Số hóa đơn',
        allowPointSelect: true,
        keys: ['name', 'y', 'selected', 'sliced'],
        data: status_transaction,
        showInLengend: true
      }]
  });
  Highcharts.chart('container2', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Biểu Đồ Doanh Thu Tháng Này'
    },
    xAxis: {
        categories: listDay
    },
    yAxis: {
        title: {
            text: 'Tổng Doanh Thu'
        },
        labels: {
            formatter: function () {
                return this.value + 'đ';
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Doanh Thu',
        marker: {
            symbol: 'circle'
        },
        data: arrtransactionMonth
    },{
        name: 'Số Hóa Đơn',
        data: arrtotalOrderInMonth
    } 
    ]
});
</script>


<!-- overlayScrollbars -->
<script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('admin/dist/js/pages/dashboard.js') }}"></script>
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>