<section class="content">
   <div class="row">
      <div class="col-md-12">
         <!-- Custom Tabs (Pulled to the right) -->
         <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
               <li class="active"><a href="#tab_1-1" data-toggle="tab" aria-expanded="true">Bulan</a></li>
               <li class=""><a href="#tab_2-2" data-toggle="tab" aria-expanded="false">Tahun</a></li>
               <li class="pull-left header"><i class="fa fa-th"></i> Data Table Rekap Akun</li>
            </ul>
            <div class="tab-content">
               <div class="tab-pane active" id="tab_1-1">
                  <div class="box box-primary">
                     <div class="box-header">
                        <div class="box-header with-border">
                           <h3 class="box-title">Filter</h3>
                        </div>
                        <div class="box-body">
                           <!--[> Date <]-->
                           <div class="row">
                              <div class="col-xs-6">
                                 <select name="Bulan" id="Bulan" class="form-control">
                                    {{ Helpers.dataBulan() }}
                                 </select>
                              </div>
                              <div class="col-xs-6">
                                 <select name="Tahun" id="Tahun" class="form-control">
                                    {{ Helpers.dataTahun() }}
                                 </select>
                              </div>
                           </div>
                           <!--[> /.form group <]-->

                        </div>
                        <!--[> /.box-body <]-->
                     </div>
                     <!--[> /.box-header <]-->
                     <div class="box-body">
                        <table id="data_akun_perbulan1" class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th>No.</th>
                                 <th>Tanggal</th>
                                 <th>Kode</th>
                                 <th>Nama</th>
                                 <th>Nominal</th>

                              </tr>
                           </thead>
                           <tbody>
                           
                           </tbody>
                        </table>
                     </div>
                     <!--[> /.box-body <]-->
                  </div>
               </div>
               <!-- /.tab-pane -->
               <!--<div class="tab-pane" id="tab_2-2">-->
                  <!--<div class="box box-primary">-->
                     <!--<div class="box-header">-->
                        <!--<div class="box-header with-border">-->
                           <!--<h3 class="box-title">Filter</h3>-->
                        <!--</div>-->
                        <!--<div class="box-body">-->
                           <!--[>[> Date <]<]-->
                           <!--<div class="row">-->
                              <!--<div class="col-xs-12">-->
                                 <!--<select name="filterTahun" id="filterTahun" class="form-control text-center">-->
                                    <!--{{ Helpers.dataTahun() }}-->
                                 <!--</select>-->
                              <!--</div>-->
                           <!--</div>-->
                           <!--[>[> /.form group <]<]-->

                        <!--</div>-->
                        <!--[>[> /.box-body <]<]-->
                     <!--</div>-->
                     <!--[>[> /.box-header <]<]-->
                     <!--<div class="box-body">-->
                        <!--<table id="data_akun_pertahun" class="table table-bordered table-striped">-->
                           <!--<thead>-->
                              <!--<tr>-->
                                 <!--<th>No.</th>-->
                                 <!--<th>Kode</th>-->
                                 <!--<th>Nama</th>-->
                                 <!--<th>Nominal</th>-->

                              <!--</tr>-->
                           <!--</thead>-->
                        <!--</table>-->
                     <!--</div>-->
                     <!--[>[>[> /.box-body <]<]<]-->
                  <!--</div>-->
               <!--</div>-->
               <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
         </div>
         <!-- nav-tabs-custom -->
      </div>
   </section>

   <script>

      $(document).ready(function() {
         $('#data_akun_perbulan1').dataTable({
            "processing": true,
            "serverside": true,
            "autoWidth": false,
            "ajax": {
               url: "Rekapakun/getAjaxBulan",
               type: "POST"
            }
         });

            $('#data_akun_pertahun').DataTable({
            "processing": true,
               "serverside": true,
               "autoWidth": false,
               "ajax": {
                  url: "rekapakun/getAjaxTahun",
                  type: "POST"
               }
            }),


            $('#Bulan, #Tahun').change(function() {
               $('#data_akun_perbulan').DataTable().destroy();
               $('#data_akun_perbulan').DataTable({
                  "autoWidth": false,
                  "ajax": {
                     url: "rekapakun/getAjaxBulan",
                     type: "POST",
                     data: {
                        "Bulan": $('#Bulan').val(), "Tahun": $('#Tahun').val()
                     }
                  }
               })

            }),

            $('#filterTahun').change(function() {
               $('#data_akun_pertahun').DataTable().destroy();
               $('#data_akun_pertahun').DataTable({
                  "autoWidth": false,
                  "ajax": {
                     url: "rekapakun/getAjaxTahun",
                     type: "POST",
                     data: {
                        "filterTahun": $('#filterTahun').val()
                     }
                  }
               })

            });
      })
   </script>
