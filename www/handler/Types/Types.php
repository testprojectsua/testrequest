<?php

/*
* Types
*
*/

abstract class Types implements ITypes
{
	public $data = null;
	public $uri  = null;

	public function __construct($data,$uri){

		$this->data = $data;
		$this->uri  = $uri;
		
    }
    
	public function template(){
		
		$path = __DIR__ . "/views/{$this->uri}.php";

		if(file_exists($path)){
			
			try{

				ob_start();

				include_once $path;

				return ob_get_clean();

			}catch(Exception $e){

				throw new Exception('Ошибка загрузки файла. ');

			}
		}

		throw new Exception('Файла не существует. ');
	}

	public static function getPost(){
		return file_get_contents('php://input');
	}
	
}