<?php

/*
* Json
*
*/

class Json extends Types
{
	public function __construct($data,$uri)
	{
		Header::pushText('contentType','Content-type: application/json');
		parent::__construct($data,$uri);
	}

	public function template(){

		return parent::template();
		
	}

	public static function parse($data){
		
		$jsonD = json_decode($data);

		if(empty($jsonD)){

			throw new Exception('Ошибка парсинга JSON.');
			
		}

		return $jsonD;

	}

	public  static function getPost(){
		$postData = parent::getPost();
		return self::parse($postData);
	}
}