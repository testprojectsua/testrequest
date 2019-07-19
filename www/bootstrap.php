<?php

/*
 * Common settings
 */

$good = '700';
$bad  = '300';
$creditScore = $good;

/*
 * Include files
 *
 */

include_once __DIR__."/handler/Errors.php";
include_once __DIR__."/handler/Header.php";
include_once __DIR__."/handler/Data.php";
include_once __DIR__."/handler/Types/ITypes.php";
include_once __DIR__."/handler/Types/Types.php";
include_once __DIR__."/handler/Types/Json.php";
include_once __DIR__."/handler/Types/XML.php";