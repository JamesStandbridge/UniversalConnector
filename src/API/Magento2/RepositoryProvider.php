<?php 

namespace UniversalConnector\API\Magento2;

use UniversalConnector\Service\Sender\CurlSender;

use UniversalConnector\API\Magento2\Repository\PriceRepository;
use UniversalConnector\API\Magento2\Repository\ProductRepository;
use UniversalConnector\API\Magento2\Repository\SourceRepository;

use UniversalConnector\API\Pipe;

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
			case "price":
				return new PriceRepository($this->HTTPservice, $pipe);

			case "product":
				return new ProductRepository($this->HTTPservice, $pipe);

			case "source":
				return new SourceRepository($this->HTTPservice, $pipe);

			default:
				throw new \LogicException("Invalid className repository");
		}
	}
}