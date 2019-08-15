<?php
//
namespace App\Modules;
//
use App\Primitives\BigQueryConnection as Connection;
//
class Pac extends Connection{
    
  public function index(){

    $query="SELECT
    BUSINESS_DATE,
    BILL_NO,
    NET_AMOUNT,
    'XML' AS DATA_SOURCE
  FROM
    `pit-analytics-2019.PIT_SISTEMAS.PAC_2018_XML`
  WHERE
    BILL_NO IN (
    SELECT
      DISTINCT(BILL_NO)
    FROM
      `pit-analytics-2019.PIT_SISTEMAS.PAC_GROUP`)
  UNION ALL
  SELECT
    BUSINESS_DATE,
    BILL_NO,
    NET_AMOUNT,
    'OPERA' AS DATA_SOURCE
  FROM
    `pit-analytics-2019.PIT_SISTEMAS.Pac_2018_Lte`
  ORDER BY
    BUSINESS_DATE";

  $result=$this->bigquery->query($query);

  return $result;

  }

  public function date(){

    $query="SELECT
    DISTINCT(BUSINESS_DATE) AS BUSINESS_DATE
  FROM
    `pit-analytics-2019.PIT_SISTEMAS.PAC_2018_XML`
  ORDER BY
    BUSINESS_DATE";

  $result=$this->bigquery->query($query);

  return $result;

  }

  public function billNo(){

    $query="SELECT
    DISTINCT(BILL_NO)
  FROM (
    SELECT
      BUSINESS_DATE,
      BILL_NO,
      NET_AMOUNT,
      'XML' AS DATA_SOURCE
    FROM
      `pit-analytics-2019.PIT_SISTEMAS.PAC_2018_XML`
    WHERE
      BILL_NO IN (
      SELECT
        DISTINCT(BILL_NO)
      FROM
        `pit-analytics-2019.PIT_SISTEMAS.PAC_GROUP`)
    UNION ALL
    SELECT
      BUSINESS_DATE,
      BILL_NO,
      NET_AMOUNT,
      'OPERA' AS DATA_SOURCE
    FROM
      `pit-analytics-2019.PIT_SISTEMAS.Pac_2018_Lte`
    ORDER BY
      BUSINESS_DATE)
  ORDER BY
    BILL_NO";

  $result=$this->bigquery->query($query);

  return $result;

  }

  public function dataSource(){

    $source=[
      0=>['DATA_SOURCE'=>'XML'],
      1=>['DATA_SOURCE'=>'OPERA']
    ];

  return $source;

  }

}
?>