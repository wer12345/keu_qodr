<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>AdminLTE 2 | Simple Tables</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.7 -->
      {{ stylesheet_link("assets/bower_components/bootstrap/dist/css/bootstrap.min.css") }}
      <!-- Font Awesome -->
      {{ stylesheet_link("assets/bower_components/font-awesome/css/font-awesome.min.css") }}
      <!-- Ionicons -->
      {{ stylesheet_link("assets/bower_components/Ionicons/css/ionicons.min.css") }}
      <!-- DataTables -->
      {{ stylesheet_link("assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}
      <!-- daterange picker -->
      {{ stylesheet_link("assets/bower_components/bootstrap-daterangepicker/daterangepicker.css") }}
      <!-- bootstrap datepicker -->
      {{ stylesheet_link("assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css") }}
      <!-- Theme style -->
      {{ stylesheet_link("assets/dist/css/AdminLTE.min.css") }}
      <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
      {{ stylesheet_link("assets/dist/css/skins/_all-skins.min.css") }}

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

      <!-- Google Font -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      <!-- jQuery 3 -->
      {{ javascript_include("assets/bower_components/jquery/dist/jquery.min.js") }}
      <!-- DataTables -->
      {{ javascript_include("assets/bower_components/datatables.net/js/jquery.dataTables.min.js") }}
      {{ javascript_include("assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") }}
   </head>
   <body>

      <section class="content">

         <div class="box">
            <div class="box-header">
               <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <table id="data_akun" class="table table-bordered table-striped listUser display responsive no-wrap">
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>Bulan</th>
                        <th>Kode</th>
                        <th>Kategori</th>
                        <th>Nominal</th>
                     </tr>
                  </thead>

               </table>
            </div>
            <!-- /.box-body -->
         </div>

      </section>

      <!-- Bootstrap 3.3.7 -->
      {{ javascript_include("assets/bower_components/bootstrap/dist/js/bootstrap.min.js") }}
      <!-- DataTables -->
      {{ javascript_include("assets/bower_components/datatables.net/js/jquery.dataTables.min.js") }}
      {{ javascript_include("assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") }}
      <!-- Slimscroll -->
      {{ javascript_include("assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js") }}
      <!-- FastClick -->
      {{ javascript_include("assets/bower_components/fastclick/lib/fastclick.js") }}
      <!-- AdminLTE App -->
      {{ javascript_include("assets/dist/js/adminlte.min.js") }}
      <!-- AdminLTE for demo purposes -->
      {{ javascript_include("assets/dist/js/demo.js") }}
      <!-- page script -->
      {{ javascript_include("assets/pnotify/pnotify.js") }}
      {{ javascript_include("assets/pnotify/pnotify.buttons.js") }}
      {{ javascript_include("assets/pnotify/pnotify.nonblock.js") }}
      <!-- date-range-picker -->
      {{ javascript_include("assets/bower_components/moment/min/moment.min.js") }}
      {{ javascript_include("assets/bower_components/bootstrap-daterangepicker/daterangepicker.js") }}
      <!-- bootstrap datepicker -->
      {{ javascript_include("assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js") }}
      <script>
         $(document).ready(function() {
            $('#data_akun').DataTable({
               "processing": true,
               "serverside": true,
               "ajax": {
                  url: "ajax/getData",
                  type: "POST"
               }
            });
         })
      </script>
   </body>
</html>
