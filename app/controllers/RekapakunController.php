<?php

class RekapakunController extends \Phalcon\Mvc\Controller
{

   public function indexAction()
   {

   }

   public function getAjaxBulanAction()
   {
      $akun  = new ViewRekapAkun();
      //$Bulan = '%';
      //if (!empty($_POST["Bulan"])) {
         //$Bulan = $this->request->getPost("Bulan");
      //}

      //$Tahun = '%';
      //if (!empty($_POST["Tahun"])) {
         //$Tahun = $this->request->getPost("Tahun");
      //}

      //if ($Bulan != '' || $Tahun != '') {
         //$json_data = $akun->filter($Bulan, $Tahun);
      //} else {
         $json_data = $akun->getRekapData();
      //}

      die(json_encode($json_data));
   }

   public function getAjaxTahunAction()
   {
      $akun      = new RefAkun();

      $Tahun     = $this->request->getPost("filterTahun");

      $json_data = $akun->getDataTahun($Tahun);

      die(json_encode($json_data));
   }

   /**
    * undocumented function
    *
    * @return void
    */
   public function getDataAction()
   {
      $curl = new Helpers();
      $res = $curl->curlget('http://localhost/keu-qodr/rekapakun/getAjaxBulan');
      die($res);
   }
   
}

