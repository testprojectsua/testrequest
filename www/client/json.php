<?php


/*
 * Include files
 *
 */

include_once __DIR__ ."/../bootstrap.php";
include_once __DIR__ ."/handler/Request.php";
include_once __DIR__ ."/handler/Response.php";
include_once __DIR__ . "/handler/settings.php";

// Get template Json
$jsonObject = new Json(Data::getarray(),'json/request');
$json = $jsonObject->template();

$request = new Request($jsonObject);

$data = $request->curl($json);

$response = new Response($jsonObject,$data);
$response->run();


