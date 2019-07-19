<?php

/*
* XML
*
*/

class XML extends Types
{
	public function __construct($data,$uri)
	{
		Header::pushText('contentType','Content-type: text/xml');
		parent::__construct($data,$uri);
	}

	public function template(){
		 return parent::template();
	}

	public static function parse($data){

		try{

			return simplexml_load_string($data);

		}catch(Exception $e){

			throw new Exception('Ошибка парсинга XML. ');

		}
	}

	public  static function getPost(){
		return self::parse(parent::getPost());
	}
}