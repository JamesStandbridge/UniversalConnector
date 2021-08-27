<?php 

namespace UniversalConnector\API\SendinBlue;

use UniversalConnector\Service\Sender\CurlSender;
use UniversalConnector\API\AbstractClass\Bearer\Pipe;

use UniversalConnector\API\SendinBlue\Repository\AccountRepository;
use UniversalConnector\API\SendinBlue\Repository\ContactRepository;

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
			case "account":
				return new AccountRepository($this->HTTPservice, $pipe);

			case "contact":
				return new ContactRepository($this->HTTPservice, $pipe);

			default:
				throw new \LogicException("Invalid className repository");
		}
	}
}