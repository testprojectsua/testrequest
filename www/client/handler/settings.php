<?php

/*
 * Settings client
 *
 */

$data = [
	"firstName"     => "Vasya",
	"lastName"      => "Pupkin",
	"dateOfBirth"   => "1984-07-31",
	"salary"    	=> "1000",
	"creditScore"   => $creditScore
];

foreach ($data as $k=>$v){
	Data::add($k,$v);
}