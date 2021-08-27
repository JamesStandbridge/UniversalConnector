<?php 

namespace UniversalConnector\API\AbstractClass\Key;

use UniversalConnector\Service\Sender\CurlSender;


use UniversalConnector\API\AbstractClass\Key\Pipe;

abstract class AbstractRepository {

	
	protected $HTTPservice;
	protected $pipe;

	public function __construct(CurlSender $api, Pipe $pipe) 
	{
		$this->HTTPservice = $api;
		$this->pipe = $pipe;
	}
}