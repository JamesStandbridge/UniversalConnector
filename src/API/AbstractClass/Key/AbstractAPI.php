<?php

namespace UniversalConnector\API\AbstractClass\Key;

abstract class AbstractAPI {
	protected $pipe;
	protected $HTTPservice;

	public function __construct($HTTPservice) {
		$this->HTTPservice = $HTTPservice;
	}
		
	abstract function initialize(string $apiKey);
	abstract protected function initPipe(string $apiKey, string $domain);
}