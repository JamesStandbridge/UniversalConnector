<?php 

namespace UniversalConnector\API;

use UniversalConnector\Service\Sender\CurlSender;
use UniversalConnector\API\Magento2\EndPoints;

use UniversalConnector\API\Pipe;

abstract class AbstractRepository {
	use EndPoints;
	
	protected $HTTPservice;
	protected $pipe;

	public function __construct(CurlSender $api, Pipe $pipe) 
	{
		$this->HTTPservice = $api;
		$this->pipe = $pipe;
	}
}