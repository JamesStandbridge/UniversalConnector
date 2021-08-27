<?php

namespace UniversalConnector\Service\Sender;

use UniversalConnector\Service\Sender\Methods;

class CurlSender  {
	use Methods;

	/**
	 * Make a CURL GET request to an EndPoint
	 * @param  string      $domain  
	 * @param  string      $endpoint 
	 * @param  array|null  $auth  
	 * @param  array       $headers
	 * @return array       $response
	 */
	public function GET(string $domain, string $endpoint, array $auth = null, array $headers = []) : array
	{
		$curl = new CurlBuilder($domain.$endpoint);
		$curl
			->setMethod($this->GET_METHOD())
			->setReturnTransfer(true);

		if($auth) $curl->addHeader($auth['type'] . $auth['token']);
		foreach($headers as $header) $curl->addHeader($header);
		
		return $curl->execute();
	}

	/**
	 * Make a CURL POST request to an EndPoint
	 * @param  string      $domain  
	 * @param  string      $endpoint 
	 * @param  [type]      $body    
	 * @param  array|null  $auth     
	 * @param  array       $headers  
	 * @return array 	   $response              
	 */
	public function POST(string $domain, string $endpoint, $body = null, array $auth = null, array $headers = []) : array
	{
		$curl = new CurlBuilder($domain.$endpoint);
		$curl
			->setMethod($this->POST_METHOD())
			->setReturnTransfer(true);

		if($auth) $curl->addHeader($auth['type'] . $auth['token']);
		if($body) {
			$curl->setBody($body);
			$curl->addHeader("Content-Type: application/json");
		}

		foreach($headers as $header) $curl->addHeader($header);

		return $curl->execute();
	}

	/**
	 * Make a CURL PUT request to an EndPoint
	 * @param string     $domain   
	 * @param string     $endpoint 
	 * @param [type]     $body     
	 * @param array|null $auth     
	 * @param array      $headers  
	 * @return array     $response
	 */
	public function PUT(string $domain, string $endpoint, $body = null, array $auth = null, array $headers = []) : array
	{
		$curl = new CurlBuilder($domain.$endpoint);
		$curl
			->setMethod($this->PUT_METHOD())
			->setReturnTransfer(true);

		if($auth) $curl->addHeader($auth['type'] . $auth['token']);
		if($body) {
			$curl->setBody($body);
			$curl->addHeader("Content-Type: application/json");
		}

		foreach($headers as $header) $curl->addHeader($header);

		return $curl->execute();
	}

	/**
	 * Make a CURL DELETE request to an EndPoint
	 * @param string     $domain   
	 * @param string     $endpoint 
	 * @param array|null $auth     
	 * @param array      $headers  
	 * @return array     $response
	 */
	public function DELETE(string $domain, string $endpoint, array $auth = null, array $headers = []) : array
	{
		$curl = new CurlBuilder($domain.$endpoint);
		$curl
			->setMethod($this->DELETE_METHOD())
			->setReturnTransfer(true);

		if($auth) $curl->addHeader($auth['type'] . $auth['token']);
		foreach($headers as $header) $curl->addHeader($header);
		
		return $curl->execute();
	}

	public function PATCH(string $domain, string $endpoint, array $auth = null, array $headers = []) {

	}
}