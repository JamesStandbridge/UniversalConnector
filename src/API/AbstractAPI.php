<?php

namespace UniversalConnector\API;

abstract class AbstractAPI {
	protected $pipe;
	protected $HTTPservice;

	public function __construct($HTTPservice) {
		$this->HTTPservice = $HTTPservice;
	}
		
	abstract function initialize(string $username, string $password, string $domain);
	abstract protected function initPipe(string $username, string $password);
	abstract protected function openPipe(string $domain);
}