<?php
//
namespace App\Modules;
//
use App\Primitives\BigQueryConnection as Connection;
//
class Pac extends Connection{
    
  public function index(){

    $query="SELECT
    TC_GROUP,
    ARRAY_AGG(STRUCT(TC_SUBGROUP,
        TRX_CODES)) AS TC_SUBGROUPS
  FROM (
    SELECT
      TC_GROUP,
      TC_SUBGROUP,
      ARRAY_AGG(STRUCT(TRX_CODE)) AS TRX_CODES
    FROM
      `pit-analytics-2019.PIT_SISTEMAS.PAC_GROUP`
    GROUP BY
      TC_GROUP,
      TC_SUBGROUP
    ORDER BY
      TC_SUBGROUP)
  GROUP BY
    TC_GROUP";

  $result=$this->bigquery->query($query);

  return $result;

  }



}
?>