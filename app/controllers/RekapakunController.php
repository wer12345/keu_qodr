<?php

class RekapakunController extends \Phalcon\Mvc\Controller
{

   public function indexAction()
   {

   }

   public function getAjaxBulanAction()
   {
      $akun  = new RefAkun();
      $Bulan = '%';
      if (!empty($_POST["Bulan"])) {
         $Bulan = $this->request->getPost("Bulan");
      }

      $Tahun = '%';
      if (!empty($_POST["Tahun"])) {
         $Tahun = $this->request->getPost("Tahun");
      }

      if ($Bulan != '' || $Tahun != '') {
         $json_data = $akun->filter($Bulan, $Tahun);
      } else {
         $json_data = $akun->getData();
      }

      die(json_encode($json_data));
   }

   public function getAjaxTahunAction()
   {
      $akun      = new RefAkun();

      $Tahun     = $this->request->getPost("filterTahun");

      $json_data = $akun->getDataTahun($Tahun);

      die(json_encode($json_data));
   }
}

