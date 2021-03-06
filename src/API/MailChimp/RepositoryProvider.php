<?php 

namespace UniversalConnector\API\MailChimp;

use UniversalConnector\Service\Sender\CurlSender;
use UniversalConnector\API\AbstractClass\Bearer\Pipe;


use UniversalConnector\API\MailChimp\Repository\SecurityRepository;
use UniversalConnector\API\MailChimp\Repository\ListRepository;


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
			case "security":
				return new SecurityRepository($this->HTTPservice, $pipe);

			case "list":
				return new ListRepository($this->HTTPservice, $pipe);
				
			default:
				throw new \LogicException("Invalid className repository");
		}
	}
}