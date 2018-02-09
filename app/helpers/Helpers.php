<?php

class Helpers
{
   public function dataKode($selected =  null)
   {
      $dataKode = RefAkun::find();

      $Kodebarang = '<option value="">All Kode</option>';
      foreach ($dataKode as $key => $value) {
         if($selected == $value->id){
            $Kodebarang.='<option value="'.$value->id.'" selected>'.$value->id.'</option>';

         }else{
            $Kodebarang.='<option value="'.$value->id.'">'.$value->id.'</option>';

         }

      }

      return $Kodebarang;

   }

   public function dataBulan($selected =  null)
   {
      $namaBulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

      $Bulan = KeuHarian::find([
         'columns' => 'DATE_FORMAT(tanggal, "%m") AS Bulan',
         'group' => 'Bulan'
      ]);
      $dataBulan = '<option value="">- Pilih Bulan -</option>';
      foreach ($Bulan as $key => $value) {
         if ($selected == $value->Bulan) {
            $dataBulan.='<option value="'.$value->Bulan.'" selected>'.$namaBulan[$value->Bulan-1].'</option>';
         } else {
            $dataBulan.='<option value="'.$value->Bulan.'" >'.$namaBulan[$value->Bulan-1].'</option>';

         }
         }
         return $dataBulan;

      }

      public function dataTahun($selected =  null)
      {
         $Bulan = KeuHarian::find([
            'columns' => 'DATE_FORMAT(tanggal, "%Y") AS Tahun',
            'group' => 'Tahun'
         ]);
         $dataBulan = '<option value="">- Pilih Tahun -</option>';
         foreach ($Bulan as $key => $value) {
            if ($selected == $value->Tahun) {
               $dataBulan.='<option value="'.$value->Tahun.'" selected>'.$value->Tahun.'</option>';
            } else {
               $dataBulan.='<option value="'.$value->Tahun.'">'.$value->Tahun.'</option>';

            }
            }
            return $dataBulan;

         }

         public function curlget($url)
         {
            $curl = curl_init();
            curl_setopt_array($curl, array(
               CURLOPT_RETURNTRANSFER => 1,
               CURLOPT_URL => $url

            ));
            $res = curl_exec($curl);
            curl_close($curl);
            return $res;

         }


      }
?>
