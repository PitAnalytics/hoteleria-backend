<?php
//
namespace App\Modules;
//
use App\Primitives\BigQueryConnection as Connection;
//
class Pac extends Connection{
    
  public function countByDate(){

    $query="SELECT
  XML.BUSINESS_DATE AS BUSINESS_DATE,
  COUNT(XML.BILL_NO) AS BILL_NO_XML,
  COUNT(OPERA.BILL_NO) AS BILL_NO_OPERA
  FROM
  `PIT_SISTEMAS.PAC_2018_XML` AS XML
FULL JOIN
  `PIT_SISTEMAS.Pac_2018_Lte` AS OPERA
ON
  XML.BUSINESS_DATE = OPERA.BUSINESS_DATE AND XML.BILL_NO = OPERA.BILL_NO
  WHERE TO_JSON_STRING(XML.BUSINESS_DATE)<>'null'
GROUP BY
  XML.BUSINESS_DATE
ORDER BY
  XML.BUSINESS_DATE";

  $result=$this->bigquery->query($query);

  return $result;

  }

}
?>