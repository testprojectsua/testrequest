<?php

/*
 * Server xml
 *
 */

include_once __DIR__."/../bootstrap.php";
include_once __DIR__ . "/handler/Response.php";

try {

	$postXML = XML::getPost();

	if($good == $postXML->creditScore){

		Data::add('code','1');
		Data::add('status','SUCCESS');
		Data::add('transaction','AC158457A86E711D0000016AB036886A03E7');

	} elseif($bad == $postXML->creditScore){

		Data::add('code','0');
		Data::add('status','REJECT');
		Header::pushText(400,'HTTP/1.1 400 Bad Request');

	} else{

		Data::add('code','0');
		Data::add('status','ERROR');
		Header::pushText(500,'HTTP/1.1 500 Internal Server Error');

		throw new Exception('Lead not Found');
	}
	
	$xmlobj = new XML(Data::getarray(),'xml/response');
	$response = new Response($xmlobj);
	$response->run();
}

catch (Exception $e) {
	
	Data::add('error',$e->getMessage());
	$xmlobj = new XML(Data::getarray(),'xml/response');
	$response = new Response($xmlobj);
	$response->run();

}