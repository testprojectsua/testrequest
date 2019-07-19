<?php

/*
 * Header
 *
 */

class Header
{

	/*Тело статуса*/
	private static $text = [];

	public static function pushText($k,$v){

		if(!isset(self::$text[$k])){
			self::$text[$k] = $v;
		}else{
			throw new Exception('Указанный статус добавлен ранее. Замените на другой.');
		}
	}

	public static function getText($k){

		if(isset(self::$text[$k])){
			return	self::$text[$k];
		}else{
			throw new Exception('Запрашиваемый статус не найден.');
		}
	}

	public static function sentAll(){

		if(empty(self::$text)){
			throw new Exception('Не найдено ни одного значения');
		}
		
		foreach(self::$text as $s){
			  header($s);
		}
	}


}