<div class="color-bg"></div>
<!-- Jquery Core Js -->
<script src="<?php echo base_url('assets/backend/bundles/libscripts.bundle.js'); ?>"></script> <!-- Lib Scripts Plugin Js -->
<script src="<?php echo base_url('assets/backend/bundles/morphingsearchscripts.bundle.js'); ?>"></script> <!-- morphing search Js -->
<script src="<?php echo base_url('assets/backend/bundles/vendorscripts.bundle.js'); ?>"></script> <!-- Lib Scripts Plugin Js -->
<script src="<?php echo base_url('assets/backend/plugins/jquery-sparkline/jquery.sparkline.min.js'); ?>"></script> <!-- Sparkline Plugin Js -->
<script src="<?php echo base_url('assets/backend/bundles/mainscripts.bundle.js'); ?>"></script><!-- Custom Js -->
<script src="<?php echo base_url('assets/backend/js/pages/index.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/pages/charts/sparkline.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/angularjs/angular.min.js'); ?>"></script>
<script>
var module = angular.module('App', []);
  module.controller('TimeCtrl', function($scope, $interval) {
    var tick = function() {
      var today = new Date();
      today.setDate(today.getDate()-35);
      var months = new Array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
      var days = new Array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
      var year = today.getFullYear();
      var month = today.getMonth();
      var d = today.getDate();
      var day = today.getDay();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      $scope.waktu = days[day] + ', ' + d + ' ' + months[month] + ' ' + year + ' ' + h + ':' +(today.getMinutes()<10?'0':'')+m + ':' +(today.getSeconds()<10?'0':'')+ s;
    }
    tick();
    $interval(tick, 1000);
  });

  function printDiv(divName){
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  }
</script>

<?php if ($link=='petugas'){ ?>
  <script src="<?php echo base_url('assets/backend/plugins/autosize/autosize.js'); ?>"></script> <!-- Autosize Plugin Js -->
  <script src="<?php echo base_url('assets/backend/plugins/momentjs/moment.js'); ?>"></script> <!-- Moment Plugin Js -->
  <!-- <script src="<?php echo base_url('assets/backend/plugins/dropzone/dropzone.js'); ?>"></script> <!-- Dropzone Plugin Js --> -->
  <script src="<?php echo base_url('assets/backend/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js'); ?>"></script>
  <script src="<?php echo base_url('assets/backend/js/pages/forms/basic-form-elements.js'); ?>"></script>
  <script src="<?php echo base_url('assets/backend/plugins/bootstrap-notify/bootstrap-notify.js'); ?>"></script> <!-- Bootstrap Notify Plugin Js -->
  <script src="<?php echo base_url('assets/backend/plugins/sweetalert/sweetalert.min.js'); ?>"></script> <!-- SweetAlert Plugin Js -->
  <script src="<?php echo base_url('assets/backend/js/pages/ui/dialogs.js'); ?>"></script>
  <script>
  $('#datepick').bootstrapMaterialDatePicker({ weekStart : 0, time: false });

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#profile").change(function() {
      readURL(this);
    });

    $(document).ready(function () {
       $("#pass1, #pass2").keyup(checkPasswordMatch);
    });

    function checkPasswordMatch() {
    var password = $("#pass1").val();
    var confirmPassword = $("#pass2").val();
    if (password != confirmPassword){
        $("#submit").attr("disabled","disabled");
        $("#divCheckPasswordMatch").html("<a style='color:red'>Password tidak sama!</a>");
    } else {
        $("#submit").removeAttr("disabled");
        $("#divCheckPasswordMatch").html("<a style='color:green'>Password sama.</a>");
      }
    }
</script>


<?php } else if ($link=='add_tugas'){ ?>
  <script src="<?php echo base_url('assets/backend/plugins/autosize/autosize.js'); ?>"></script> <!-- Autosize Plugin Js -->
  <script src="<?php echo base_url('assets/backend/plugins/momentjs/moment.js'); ?>"></script> <!-- Moment Plugin Js -->
  <!-- <script src="<?php echo base_url('assets/backend/plugins/dropzone/dropzone.js'); ?>"></script> <!-- Dropzone Plugin Js --> -->
  <script src="<?php echo base_url('assets/backend/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js'); ?>"></script>
  <script src="<?php echo base_url('assets/backend/js/pages/forms/basic-form-elements.js'); ?>"></script>
  <script src="<?php echo base_url('assets/backend/plugins/bootstrap-notify/bootstrap-notify.js'); ?>"></script> <!-- Bootstrap Notify Plugin Js -->
  <script src="<?php echo base_url('assets/backend/plugins/sweetalert/sweetalert.min.js'); ?>"></script> <!-- SweetAlert Plugin Js -->
  <script src="<?php echo base_url('assets/backend/js/pages/ui/dialogs.js'); ?>"></script>
  <script src="<?php echo base_url('assets/backend/js/ckeditor/ckeditor.js'); ?>"></script>
<script>
  $('#datepick').bootstrapMaterialDatePicker({ weekStart : 0, time: false });

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

var ckeditor = CKEDITOR.replace('isi',{height:'200px'});
CKEDITOR.disableAutoInline = true;
</script>

<?php } else if ($link=='presensi'|| $link=='status'|| $link=='list_tugas'|| $link=='pantau') { ?>
<script src="<?php echo base_url('assets/datatables/datatables.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/plugins/autosize/autosize.js'); ?>"></script> <!-- Autosize Plugin Js -->
<script src="<?php echo base_url('assets/backend/plugins/momentjs/moment.js'); ?>"></script> <!-- Moment Plugin Js -->
<script src="<?php echo base_url('assets/backend/js/pages/forms/basic-form-elements.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/plugins/bootstrap-notify/bootstrap-notify.js'); ?>"></script> <!-- Bootstrap Notify Plugin Js -->
<script src="<?php echo base_url('assets/backend/plugins/sweetalert/sweetalert.min.js'); ?>"></script> <!-- SweetAlert Plugin Js -->
<script src="<?php echo base_url('assets/backend/js/pages/ui/dialogs.js'); ?>"></script>
</script>
  <script type="text/javascript">
      $(document).ready(function() {
        // var table = $('#list').DataTable( {
        //     "pagingType": "full_numbers"
        // });

        // $("select").on('change',function(){
        //    if($(this).find('option:selected').text()=="-- Pilih Periode --")
        //        $(".btn").attr('disabled',true)
        //    else
        //        $(".btn").attr('disabled',false)
        // });

        var table = $('#list').DataTable( {
          "paging":   true,
          "ordering": true,
          "info":     true,
          "bFilter": true
        });
      });

  </script>
  <script src="<?php echo base_url('assets/backend/js/tambahan.js'); ?>"></script> <!-- Bootstrap Notify Plugin Js -->
  <script src="<?php echo base_url('assets/backend/bundles/fullcalendarscripts.bundle.js'); ?>"></script>
  <script src="<?php echo base_url('assets/backend/js/pages/calendar/calendar.js'); ?>"></script>
<?php } else if ($link=='shift'){ ?>
  <script src="<?php echo base_url('assets/backend/plugins/momentjs/moment.js'); ?>"></script> <!-- Moment Plugin Js -->
  <script src="<?php echo base_url('assets/backend/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js'); ?>"></script>
  <script src="<?php echo base_url('assets/backend/bundles/fullcalendarscripts.bundle.js'); ?>"></script><!--/ calender javascripts -->
  <script src="<?php echo base_url('assets/backend/js/pages/calendar/regu.js'); ?>"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
  <script src="<?php echo base_url('assets/datatables/datatables.js'); ?>"></script>
  <script>
    $(document).ready(function(){
      var table = $('#regu').DataTable( {
        "paging":   true,
        "ordering": true,
        "info":     true,
        "bFilter": true
      });

      $('#datepick').bootstrapMaterialDatePicker({ weekStart : 0, time: false });

      $('#mulaipicker1').timepicker({
        timeFormat: 'HH:mm:ss',
        interval: 60,
        dynamic: false,
        dropdown: true,
        scrollbar: true
      });
      $('#mulaipicker2').timepicker({
        timeFormat: 'HH:mm:ss',
        interval: 60,
        dynamic: false,
        dropdown: true,
        scrollbar: true
      });
      $('#mulaipicker3').timepicker({
        timeFormat: 'HH:mm:ss',
        interval: 60,
        dynamic: false,
        dropdown: true,
        scrollbar: true
      });
      $('#mulaipicker4').timepicker({
        timeFormat: 'HH:mm:ss',
        interval: 60,
        dynamic: false,
        dropdown: true,
        scrollbar: true
      });
      $('#selesaipicker1').timepicker({
        timeFormat: 'HH:mm:ss',
        interval: 60,
        dynamic: false,
        dropdown: true,
        scrollbar: true
      });
      $('#selesaipicker2').timepicker({
        timeFormat: 'HH:mm:ss',
        interval: 60,
        dynamic: false,
        dropdown: true,
        scrollbar: true
      });
      $('#selesaipicker3').timepicker({
        timeFormat: 'HH:mm:ss',
        interval: 60,
        dynamic: false,
        dropdown: true,
        scrollbar: true
      });
      $('#selesaipicker4').timepicker({
        timeFormat: 'HH:mm:ss',
        interval: 60,
        dynamic: false,
        dropdown: true,
        scrollbar: true
      });
    });
  </script>
<?php } else if ($link=='jadwal'){ ?>
  <script src="<?php echo base_url('assets/backend/bundles/fullcalendarscripts.bundle.js'); ?>"></script><!--/ calender javascripts -->
  <script src="<?php echo base_url('assets/backend/js/pages/calendar/jadwal.js'); ?>"></script>
<?php } else if ( $link=='laporan') { ?>
<script src="<?php echo base_url('assets/datatables/datatables.js'); ?>"></script>
</script>
  <script type="text/javascript">
      $(document).ready(function() {

        // var elements = document.getElementsByClassName("periode");
        // for(var i=0; i<elements.length; i++) {
        //
        //     $("#periode"+i).on('change',function(){
        //      if($(this).find('option:selected').text()=="-- Pilih Periode --")
        //          $("#btn"+i).attr('disabled',true)
        //      else
        //          $("#btn"+i).attr('disabled',false)
        //   });
        // }
        var table = $('#list').DataTable( {
          "paging":   true,
          "ordering": true,
          "info":     true,
          "bFilter": true
        });
      });

    MergeGridCells();

      function MergeGridCells() {
          var dimension_cells = new Array();
          var dimension_col = null;
          var columnCount = $("#list2 tr:first th").length;
          for (dimension_col = 0; dimension_col < columnCount; dimension_col++) {
              // first_instance holds the first instance of identical td
              var first_instance = null;
              var rowspan = 1;
              // iterate through rows
              $("#list2").find('tr').each(function () {
                  // find the td of the correct column (determined by the dimension_col set above)
                  var dimension_td = $(this).find('td:nth-child(' + dimension_col + ')');
                  if (first_instance == null) {
                      // must be the first row
                      first_instance = dimension_td;
                  } else if (dimension_td.text() == first_instance.text()) {
                      // the current td is identical to the previous
                      // remove the current td
                      dimension_td.remove();
                      ++rowspan;
                      // increment the rowspan attribute of the first instance
                      first_instance.attr('rowspan', rowspan);
                  } else {
                      // this cell is different from the last
                      first_instance = dimension_td;
                      rowspan = 1;
                  }
              });
          }
      }

      function printDiv(divName){
  			var printContents = document.getElementById(divName).innerHTML;
  			var originalContents = document.body.innerHTML;
  			document.body.innerHTML = printContents;
  			window.print();
  			document.body.innerHTML = originalContents;
  		}
  </script>
  <script src="<?php echo base_url('assets/backend/js/tambahan.js'); ?>"></script> <!-- Bootstrap Notify Plugin Js -->
  <script src="<?php echo base_url('assets/backend/bundles/fullcalendarscripts.bundle.js'); ?>"></script><!--/ calender javascripts -->
  <script src="<?php echo base_url('assets/backend/js/pages/calendar/calendar.js'); ?>"></script>

  <?php } else if ($link=='gaji'){ ?>

  <script src="<?php echo base_url('assets/datatables/datatables.js'); ?>"></script>
  <script src="<?php echo base_url('assets/backend/js/jquery.formatCurrency-1.4.0.js'); ?>"></script>
  <script type="text/javascript">
      $(document).ready(function()
      {
          $('.currency').formatCurrency();
          $('.currency').blur(function()
          {
              $('.currency').formatCurrency();
          });
      });
      $(document).ready(function()
      {
        var table = $('#list').DataTable(
          {
            "pagingType": "full_numbers"
        });
      });
  </script>
<?php } else if ($link=='ada1' || $link=='ada2' || $link=='ada3'){ ?>
  <script src="<?php echo base_url('assets/backend/plugins/momentjs/moment.js'); ?>"></script> <!-- Moment Plugin Js -->
  <script src="<?php echo base_url('assets/backend/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js'); ?>"></script>
  <script src="<?php echo base_url('assets/backend/plugins/bootstrap-notify/bootstrap-notify.js'); ?>"></script> <!-- Bootstrap Notify Plugin Js -->
  <script src="<?php echo base_url('assets/backend/plugins/sweetalert/sweetalert.min.js'); ?>"></script> <!-- SweetAlert Plugin Js -->
  <script src="<?php echo base_url('assets/backend/js/pages/ui/dialogs.js'); ?>"></script>
  <script src="<?php echo base_url('assets/datatables/datatables.js'); ?>"></script>
  <script>
    var table = $('#adapantai').DataTable( {
      "paging":   true,
      "ordering": true,
      "info":     true,
      "bFilter": true
    });

    $('#datepick').bootstrapMaterialDatePicker({ weekStart : 0, time: false });

  </script>
<?php } else if ($link=='struktur'){ ?>
<!--<script src="https://balkangraph.com/js/latest/OrgChart.js"></script>-->
<!--  <script type="text/javascript">-->
<!--  var chart = new OrgChart(document.getElementById("tree"), {-->
<!--          nodeBinding: {-->
<!--              field_0: "name"-->
<!--          },-->
<!--          nodes: [-->
<!--              { id: 1, name: "Amber McKenzie" },-->
<!--              { id: 2, pid: 1, name: "Ava Field" },-->
<!--              { id: 3, pid: 1, name: "Peter Stevens" }-->
<!--          ]-->
<!--      });-->
<!--  </script>-->
<?php } else if ($link=='galeri'){ ?>
  <script src="<?php echo base_url('assets/backend/js/tambahan.js'); ?>"></script>
  <script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#preview').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#foto").change(function() {
    readURL(this);
  });
  </script>

<?php } ?>
</body>
</html>
