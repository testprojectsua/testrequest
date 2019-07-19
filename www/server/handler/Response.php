<?php
/*
 * Response server
 *
 */


class Response
{
	public $type = null;

	public function __construct(ITypes $type)
	{
		$this->type = $type;
	}

	public function run()
	{
		Header::sentAll();
		echo $this->type->template();
	}
	
}