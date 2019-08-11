<?php

namespace App\Tools;

use GuzzleHttp\HTTP\Client;
use Google\Cloud\BigQuery\BigQueryClient as BigQuery;
use Google\Cloud\Core\ExponentialBackoff;

class BigQueryParser{

    //instancia estatica de bigquery
    private static $instance=null;

    //clase de bigquery cliente
    private $bigQuery;

    //constructor estatico
    public static function instanciate($config){

        if (!self::$instance instanceof self){

            self::$instance = new self($config);
   
        }

       return self::$instance;

    }


    //constructor con clase anidada
    private function __construct($config){

        $this->bigQuery = new BigQuery($config);

    }

    //query general con arreglo como resultado
    public function query($query){

        $result=[];

        try{
            //creamos query con string de sql
            $jobConfig = $this->bigQuery->query($query);
            $job = $this->bigQuery->startQuery($jobConfig);
            
            $queryResults = $job->queryResults();
            unset($job);

            foreach ($queryResults as $row) {

                $result[]=$row;
                unset($row);

            }

            unset($queryResults);

        }
        catch(Exception $e){

            die($e);

        }

        return $result;

    }

}
