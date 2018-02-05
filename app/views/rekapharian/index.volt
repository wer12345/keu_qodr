<section class="content">
   <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default">Add Keuangan Harian</button>
   <div class="row">
      <div class="col-xs-12">
         <div class="box">
            <div class="box-header">
               <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <table id="data_keu_harian" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>Cabang</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Akun</th>
                        <th>Jumlah Barang</th>
                        <th>Harga Satuan</th>
                        <th>Satuan Barang</th>
                        <th>Total Harga</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                        <th>Keterangan</th>
                        <th>Pelaku</th>

                     </tr>
                  </thead>
                  <tbody id="listKeuHarian">

                  </tbody>
               </table>
            </div>
            <!-- /.box-body -->
         </div>
      </div>
   </div>

</section>
<div id="modal-default" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
         <form id="addKeuharian" class="addKeuharian" action="rekapharian/add" role="form">
            <div class="modal-header">
               <button class="close colse-modal" data-dismiss="modal" aria-label-"Close">
                  <span aria-hidden="true">&times;</span>
               </button>
               <h4 class="modal-title">
                  Add Keuangan harian
               </h4>
               <div class="modal-body">
                  <div class="input-group-id">
                     <input class="form-control id" name="id" type="hidden" id="id">
                  </div>
                  <div class="input-group">
                     <input type="hidden" name="cabang_id" value="MGL">
                  </div>
                  <div class="col-md-6">
                     <label for="">Tanggal</label>
                     <div class="input-group date">
                        <div class="input-group-addon">
                           <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" class="form-control pull-right" name="tanggal" required>
                        <!-- <input type="text" class="form-control pull-right" name="tanggal" id="datepicker" placeholder="tanggal"> -->
                     </div>
                     <br>
                     <label for="">Jumlah Barang</label>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-sort-alpha-asc"></i></span>
                        <input type="text" class="form-control numeric-only" name="jml_barang" id="jml_barang" onkeyup="hitung();" placeholder="Jumlah Barang" required>
                     </div>
                     <br>
                  </div>
                  <div class="col-md-6">
                     <label for="">Nama Barang</label>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-shopping-bag"></i></span>
                        <input type="text" class="form-control alphabet-only" id="ay" name="nama_barang" placeholder="Nama Barang" required>
                     </div>
                     <br>
                     <label for="">Harga Satuan</label>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                        <input type="text" class="form-control numeric-only" name="harga_satuan" id="harga_satuan" onkeyup="hitung();" placeholder="Harga Satuan" required>
                     </div>
                     <br>
                  </div>
                  <div class="col-md-6">
                     <label for="">Akun</label>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-info-circle"></i></span>
                        <select class="form-control" name="akun_id" required>
                        </select>
                     </div>
                     <br>
                     <label for="">Total Harga</label>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-btc"></i></span>
                        <input type="text" class="form-control" name="total_harga" id="total_bayar" placeholder="Total Harga" readonly>
                     </div>
                     <br>
                  </div>


               </div>
            </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary dropdown-toggle btnAction">
                     Add
                  </button>
               </div>
         </form>
      </div>
   </div>
</div>

<script>
   $(document).ready(function() {
      $('#data_keu_harian').DataTable({
         "processing" : false,
         "serverside": true,
         "ajax": {
            url: "rekapharian/getAjax"
         }
      })
   })
</script>
