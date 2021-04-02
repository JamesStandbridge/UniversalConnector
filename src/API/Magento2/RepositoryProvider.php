<?php 

namespace App\API\Magento2;

use App\Service\Sender\CurlSender;

use App\API\Magento2\Repository\PriceRepository;

use App\API\Pipe;

class RepositoryProvider {
	private $HTTPservice;

	public function __construct(CurlSender $api)
	{
		$this->HTTPservice = $api;
	}

	public function getRepository($class, $pipe)
	{
		switch($class) 
		{
			case "price" :
				return new PriceRepository($this->HTTPservice, $pipe);

			default:
				throw new \LogicException("Invalid className repository");
		}
	}
}