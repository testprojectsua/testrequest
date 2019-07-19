<?php

/*
 * Array of data
 * */

class Data
{
	private static $data = [];

	public static function getarray(){

		return self::$data;

	}

	public static function add($k,$v){

		if(!isset(self::$data[$k])){
			self::$data[$k] = $v;
		}else{
			throw new Exception('Данный ключ добавлен ранее. Замените на другой.');
		}
	}
}