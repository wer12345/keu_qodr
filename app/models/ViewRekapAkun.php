<?php

class ViewRekapAkun extends \Phalcon\Mvc\Model
{

   /**
    *
    * @var string
    * @Column(column="Bulan", type="string", length=7, nullable=true)
    */
   public $bulan;

   /**
    *
    * @var double
    * @Column(column="Nominal", type="double", length=33, nullable=true)
    */
   public $nominal;

   /**
    *
    * @var string
    * @Column(column="Kode", type="string", length=3, nullable=false)
    */
   public $kode;

   /**
    *
    * @var string
    * @Column(column="Kategori", type="string", length=16, nullable=false)
    */
   public $kategori;

   /**
    * Initialize method for model.
    */
   public function initialize()
   {
      $this->setSchema("qodr");
      $this->setSource("view_rekap_akun");
   }

   /**
    * Returns table name mapped in the model.
    *
    * @return string
    */
   public function getSource()
   {
      return 'view_rekap_akun';
   }

   /**
    * Allows to query a set of records that match the specified conditions
    *
    * @param mixed $parameters
    * @return ViewRekapAkun[]|ViewRekapAkun|\Phalcon\Mvc\Model\ResultSetInterface
    */
   public static function find($parameters = null)
   {
      return parent::find($parameters);
   }

   /**
    * Allows to query the first record that match the specified conditions
    *
    * @param mixed $parameters
    * @return ViewRekapAkun|\Phalcon\Mvc\Model\ResultInterface
    */
   public static function findFirst($parameters = null)
   {
      return parent::findFirst($parameters);
   }

   public function getRekapData()
   {
      $requestData = $_REQUEST;
      //echo "<pre>".print_r($_REQUEST)."</pre>";
      //die();
      $sql = "SELECT * FROM ViewRekapAkun";
      $query = $this->modelsManager->executeQuery($sql);
      $totalData = count($query);
      $totalFiltered = $totalData;

      $no = 1;
      $data = array();

      foreach ($query as $key => $value) {
         $dataAkun = array();
         $dataAkun[] = $no;
         $dataAkun[] = date("F, Y", strtotime($value->Bulan));
         $dataAkun[] = $value->Kode;
         $dataAkun[] = $value->Kategori;
         $dataAkun[] = "Rp ".number_format(abs($value->Nominal));

         $data[] = $dataAkun;
         $no++;
      }

      $json_data = array(
         //"draw"           => intval($requestData['draw']),
         //"recordsTotal"   => intval($totalData),
         //"recordFiltered" => intval($totalFiltered),
         "data"           => $data
      );

      //$json_data = $data;

      return $json_data;
   }

   public function getData()
   {
      $sql = "SELECT * FROM ViewRekapAkun";
      $query = $this->modelsManager->executeQuery($sql);
      $totalData = count($query);
      $totalFiltered = $totalData;

      $no = 1;
      $data = array();

      foreach ($query as $key => $value) {
         $dataAkun = array();
         $dataAkun[] = $no;
         $dataAkun[] = date("F, Y", strtotime($value->Bulan));
         $dataAkun[] = $value->Kode;
         $dataAkun[] = $value->Kategori;
         $dataAkun[] = "Rp ".number_format(abs($value->Nominal));

         $data[] = $dataAkun;
         $no++;
      }

      $json_data = $data;

      return $json_data;
   }
}
