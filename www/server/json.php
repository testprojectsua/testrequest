<?php
/*
 * Server json
 * 
 */


include_once __DIR__."/../bootstrap.php";
include_once __DIR__ . "/handler/Response.php";

try {

	$postJson = Json::getPost()->userInfo;

	if($good == $postJson->creditScore){
		
		Data::add('status','SUCCESS');

	} elseif($bad == $postJson->creditScore){

		Data::add('status','REJECT');
		Header::pushText(400,'HTTP/1.1 400 Bad Request');
		
	} else{

		Data::add('status','ERROR');
		Header::pushText(500,'HTTP/1.1 500 Internal Server Error');

		throw new Exception('Lead not Found');
	}
	
	$jsonobj = new Json(Data::getarray(),'json/response');
	$response = new Response($jsonobj);
	$response->run();
}

catch (Exception $e) {
	
	Data::add('error',$e->getMessage());
	$jsonobj = new Json(Data::getarray(),'json/response');
	$response = new Response($jsonobj);
	$response->run();

}