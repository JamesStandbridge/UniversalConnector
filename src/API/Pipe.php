<?php

namespace App\API;


abstract class Pipe {
	protected $token;
	protected $domain;

	abstract function setToken(string $token);
	abstract function setDomain(string $domain);

	public function getToken() : string 
	{
		return $this->token;
	}

	public function getDomain() : string 
	{
		return $this->domain;
	}
}