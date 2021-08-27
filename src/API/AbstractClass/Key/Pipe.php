<?php

namespace UniversalConnector\API\AbstractClass\Key;


abstract class Pipe {
	protected string $apiKey;
	protected string $domain;

	public function __construct(string $apiKey, string $domain)
	{
		$this->apiKey = $apiKey;
		$this->domain = $domain;
	}

	public function getAPIKey() : string 
	{
		return $this->apiKey;
	}	

	public function getDomain() : string
	{
		return $this->domain;
	}
}