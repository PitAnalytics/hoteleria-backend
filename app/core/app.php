<?php
//
/************************/
/*****PSR-7-INTERFACE****/
/************************/
//
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
//
/************************/
/*****SLIM-INSTANCE******/
/************************/
//
$app = new \Slim\App(['settings' => ['displayErrorDetails' => true,'responseChunkSize' => 10096]]);
//
/*********************/
/******CONTAINER******/
/*********************/
//
require_once '../app/core/container.php';
//
/******************/
/****ROUTER********/
/******************/
//
$app->get('/', \App\Controllers\TestController::class.':wellcome');
$app->get('/pac/date/group', \App\Controllers\PacController::class.':countByDate');
//
/******************/
/****EJECUTAMOS****/
/******************/
//
$app->run();

?>
