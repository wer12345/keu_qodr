<section class="content">
   <div class="row">
      <div class="col-xs-12">
         <div class="nav-tabs-custom" style="cursor: move;">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right ui-sortable-handle">
               <li id="bulan_tab" class="active"><a href="#revenue-chart" data-toggle="tab" aria-expanded="true">Bulan</a></li>
               <li id="tahun_tab" class=""><a href="#sales-chart" data-toggle="tab" aria-expanded="false">Tahun</a></li>
               <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
            </ul>
            <div class="tab-content no-padding">
               <!-- Morris chart - Sales -->
               <div class="tab-pane active" id="revenue-chart">
                  <div class="box box-primary">
                     <div class="box-header">
                        <div class="box-header with-border">
                           <h3 class="box-title">Filter</h3>
                        </div>
                        <div class="box-body">
                           <!-- Date -->
                           <div class="row">
                              <div class="col-xs-6">
                                 <select name="Bulan" id="Bulan" class="form-control">
                                    <?= $this->Helpers->dataBulan() ?>
                                 </select>
                              </div>
                              <div class="col-xs-6">
                                 <select name="Tahun" id="Tahun" class="form-control">
                                    <?= $this->Helpers->dataTahun() ?>
                                 </select>
                              </div>
                           </div>
                           <!-- /.form group -->

                        </div>
                        <!-- /.box-body -->
                        <br>

                        <h3 class="box-title">Data Table Rekap Akun</h3>
                     </div>
                     <!-- /.box-header -->
                     <div class="box-body">
                        <table id="data_akun_perbulan" class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th>No.</th>
                                 <th>Tanggal</th>
                                 <th>Kode</th>
                                 <th>Nama</th>
                                 <th>Nominal</th>

                              </tr>
                           </thead>
                           <tbody id="listAkun">

                           </tbody>
                        </table>
                     </div>
                     <!-- /.box-body -->
                  </div>         
               </div>
               <div class="tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                  <div class="box box-primary">
                     <div class="box-header">
                        <div class="box-header with-border">
                           <h3 class="box-title">Filter</h3>
                        </div>
                        <div class="box-body">
                           <!-- Date -->
                           <div class="row">
                              <div class="col-xs-12">
                                 <select name="filterTahun" id="filterTahun" class="form-control text-center">
                                    <?= $this->Helpers->dataTahun() ?>
                                 </select>
                              </div>
                           </div>
                           <!-- /.form group -->

                        </div>
                        <!-- /.box-body -->
                        <br>

                        <h3 class="box-title">Data Table Rekap Akun</h3>
                     </div>
                     <!-- /.box-header -->
                     <div class="box-body">
                        <table id="data_akun_pertahun" class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th>No.</th>
                                 <th>Kode</th>
                                 <th>Nama</th>
                                 <th>Nominal</th>

                              </tr>
                           </thead>
                           <tbody id="listAkun">

                           </tbody>
                        </table>
                     </div>
                     <!-- /.box-body -->
               </div>
            </div>
         </div>



      </div>
   </div>

</section>

<script>

   $(document).ready(function() {

      $('#data_akun_perbulan').DataTable({
         "autoWidth": false,
         "ajax": {
            url: "rekapakun/getAjaxBulan",
         }
      }),

         $('#data_akun_pertahun').DataTable({
            "autoWidth": false,
            "ajax": {
               url: "rekapakun/getAjaxTahun"
            }
         }),


         $('#Bulan, #Tahun').change(function() {
            $('#data_akun_perbulan').DataTable().destroy();
            $('#data_akun_perbulan').DataTable({
               "autoWidth": false,
               "pageLength": 25,
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
               "pageLength": 25,
               "ajax": {
                  url: "rekapakun/getAjaxTahun",
                  type: "POST",
                  data: {
                     "filterTahun": $('#filterTahun').val()
                  }
               }
            })

         }),


         $('#data_akun_perbulan tbody').on( 'click', 'tr', function () {
            var table = $('#data_akun_perbulan').DataTable();
            console.log( table.row( this  ).data()  );

         }  );
   })
</script>
