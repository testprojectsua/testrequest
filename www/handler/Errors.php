<?php

/*
 * Errors
 *
 */

// Exceptions
function exceptions_error_handler($severity, $message, $filename, $lineno) {
	throw new ErrorException($message, 0, $severity, $filename, $lineno);
}
set_error_handler('exceptions_error_handler');

// Fatal errors
function shutDownFunction() {

	$error = error_get_last();

	// fatal error, E_ERROR === 1
	if ($error['type'] === E_ERROR) {
		
		echo "<pre>";
		echo $error['line'];
		echo $error['message'];
		echo $error['file'];
		echo "</pre>";
	}
}
register_shutdown_function('shutDownFunction');