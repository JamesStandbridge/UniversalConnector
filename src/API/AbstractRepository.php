<?php 

namespace App\API;

use App\Service\Sender\CurlSender;
use App\API\Magento2\EndPoints;

use App\API\Pipe;

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