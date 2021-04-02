<?php 

namespace UniversalConnector\API\Magento2;

use UniversalConnector\API\Pipe;

class Magento2Pipe extends Pipe {
	private $username;
	private $password;

	public function __construct(string $username, string $password)
	{
		$this->username = $username;
		$this->password = $password;
	}

	public function setToken(string $token) : self 
	{
		$this->token = $token;
		return $this;
	}	

	public function setDomain(string $domain) : self
	{
		$this->domain = $domain;
		return $this;
	}

	public function getUsername() : string 
	{
		return $this->username;
	}

	public function getPassword() : string 
	{
		return $this->password;
	}
}