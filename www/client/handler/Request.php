<?php

/*
 * Class Request client
 *
 */

class Request
{
	public $header = null;
	public $url    = null;

	public function __construct(ITypes $object)
	{
		$this->header = Header::getText('contentType');
		$this->urlPush($object);
	}

	private function urlPush(ITypes $object){

		if($object instanceof XML){
			$name = 'xml';
		}elseif($object instanceof Json){
			$name = 'json';
		}else{

			throw new Exception('Объект не принадлежит никакому из вышеперечисленных классов');

		}

		$this->url = "http://{$_SERVER['HTTP_HOST']}/server/{$name}.php";

	}

	
	public function curl($fields){

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,$this->url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array($this->header));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

		if (curl_errno($ch))
		{
			// moving to display page to display curl errors
			echo curl_errno($ch) ;
			echo curl_error($ch);
		}
		else
		{  
			//getting response from server
			return curl_exec($ch);
		}
    }
}