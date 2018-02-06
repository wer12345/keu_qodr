<?php

class RefAkun extends \Phalcon\Mvc\Model
{

   /**
    *
    * @var string
    * @Primary
    * @Column(column="id", type="string", length=3, nullable=false)
    */
   public $id;

   /**
    *
    * @var string
    * @Column(column="nama", type="string", length=16, nullable=false)
    */
   public $nama;

   /**
    * Initialize method for model.
    */
   public function initialize()
   {
      $this->setSchema("qodr");
      $this->setSource("ref_akun");
   }

   /**
    * Returns table name mapped in the model.
    *
    * @return string
    */
   public function getSource()
   {
      return 'ref_akun';
   }

   /**
    * Allows to query a set of records that match the specified conditions
    *
    * @param mixed $parameters
    * @return RefAkun[]|RefAkun|\Phalcon\Mvc\Model\ResultSetInterface
    */
   public static function find($parameters = null)
   {
      return parent::find($parameters);
   }

   /**
    * Allows to query the first record that match the specified conditions
    *
    * @param mixed $parameters
    * @return RefAkun|\Phalcon\Mvc\Model\ResultInterface
    */
   public static function findFirst($parameters = null)
   {
      return parent::findFirst($parameters);
   }

   public function getData() 
   {
      $sql = "SELECT a.*, SUM(h.debit)-SUM(h.kredit) as Nominal, h.tanggal as Bulan, h.akun_id as Kode FROM RefAkun a, KeuHarian h WHERE h.akun_id = a.id GROUP BY Bulan, h.akun_id ORDER BY Bulan DESC";
      $query = $this->modelsManager->executeQuery($sql);

      $data  = array();
      $no    = $requestData['start']+1;

      foreach($query as $key => $value) {
         $dataAkun   = array();
         $dataAkun[] = $no;
         $dataAkun[] = date("F, Y", strtotime($value->Bulan));
         $dataAkun[] = $value->Kode;
         $dataAkun[] = $value->a->nama;
         $dataAkun[] = "Rp ".number_format(abs($value->Nominal));

         $data[]     = $dataAkun;
         $no++;
      }

      $json_data = array(
         "draw"            => intval( $requestData['draw'] ),
         "recordsTotal"    => intval( $totalData ),
         "recordsFiltered" => intval( $totalFiltered ),
         "data"            => $data
      );

      return $json_data;
   }

   /**
    * undocumented function
    *
    * @return void
    */
   public function filter($Bulan, $Tahun)
   {
      $filter = $Tahun.'-'.$Bulan.'-%';

      $sql = "SELECT a.*, SUM(h.debit)-SUM(h.kredit) as Nominal, date_format(h.tanggal, '%Y-%m') as Bulan, h.akun_id as Kode FROM RefAkun a, KeuHarian h WHERE h.akun_id = a.id AND h.tanggal LIKE '$filter' GROUP BY Bulan, h.akun_id ORDER BY Bulan DESC";
      $query = $this->modelsManager->executeQuery($sql);

      $data = array();
      $no = $requestData['start']+1;

      foreach($query as $key => $value) {
         $dataAkun   = array();
         $dataAkun[] = $no;
         $dataAkun[] = date("F, Y", strtotime($value->Bulan));
         $dataAkun[] = $value->Kode;
         $dataAkun[] = $value->a->nama;
         $dataAkun[] = "Rp ".number_format(abs($value->Nominal));

         $data[]     = $dataAkun;
         $no++;
      }

      $json_data = array(
         "draw"            => intval( $requestData['draw'] ),
         "recordsTotal"    => intval( $totalData ),
         "recordsFiltered" => intval( $totalFiltered ),
         "data"            => $data
      );

      return $json_data;
   }

   public function getDataTahun($Tahun = '') 
   {

      if ($Tahun != '') {
         $Tahun.= '%';
         $sql = "SELECT a.*, SUM(h.debit)-SUM(h.kredit) as Nominal, h.akun_id as Kode FROM RefAkun a, KeuHarian h WHERE h.akun_id = a.id AND h.tanggal like '$Tahun' GROUP BY Kode";
      } else {
         $sql = "SELECT a.*, SUM(h.debit)-SUM(h.kredit) as Nominal, h.akun_id as Kode FROM RefAkun a, KeuHarian h WHERE h.akun_id = a.id GROUP BY Kode";
      }

      $query = $this->modelsManager->executeQuery($sql);

      $data  = array();
      $no    = $requestData['start']+1;

      foreach($query as $key => $value) {
         $dataAkun   = array();
         $dataAkun[] = $no;
         $dataAkun[] = $value->Kode;
         $dataAkun[] = $value->a->nama;
         $dataAkun[] = "Rp ".number_format(abs($value->Nominal));

         $data[]     = $dataAkun;
         $no++;
      }

      $json_data = array(
         "draw"            => intval( $requestData['draw'] ),
         "recordsTotal"    => intval( $totalData ),
         "recordsFiltered" => intval( $totalFiltered ),
         "data"            => $data
      );

      return $json_data;
   }

}
