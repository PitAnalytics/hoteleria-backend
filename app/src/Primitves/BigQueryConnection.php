<?php

namespace App\Primitives;

class BigQueryConnection{

    protected $bigquery;

    public function __construct($bigquery){

        $this->bigquery=$bigquery;

    }
    
}

?>