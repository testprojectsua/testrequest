<?php
/*
 * Class Response client
 *
 * */

class Response
{
	private $status = null;

	public function __construct(ITypes $object,$data)
	{

		if($object instanceof XML){
			$this->status = XML::parse($data)->returnCodeDescription;
		}elseif($object instanceof Json){
			$this->status = Json::parse($data)->SubmitDataResult;
		}else{
			throw new Exception('Объект не принадлежит никакому из вышеперечисленных классов');
		}
	}

	public function run()
	{
		if($this->status == 'success'){
			$this->success();
		}elseif($this->status == 'reject'){
			$this->reject();
		}else{
			$this->error();
		}
	}
	

	public function success()
	{
		echo $this->status;
	}
	
	public function reject()
	{
		echo $this->status;
	}


	public function error()
	{
		echo $this->status;
	}
	
}