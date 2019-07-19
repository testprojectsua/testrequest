<?php

/*
 * Include files
 *
 */

include_once __DIR__."/../bootstrap.php";
include_once __DIR__ . "/handler/Request.php";
include_once __DIR__ . "/handler/Response.php";
include_once __DIR__ . "/handler/settings.php";

// Get template XML
$xmlObject = new XML(Data::getarray(),'xml/request');
$xml = $xmlObject->template();

$request = new Request($xmlObject);
$data = $request->curl($xml);

$response = new Response($xmlObject,$data);
$response->run();


