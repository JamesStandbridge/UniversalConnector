<?php 

namespace UniversalConnector\API\Magento2;


class Context {

	private $website_id;

	public function __construct() {}

	public function setWebsiteID(int $website_id) 
	{
		$this->website_id = $website_id;
	}

	public function getWebsiteID() : int
	{
		return $this->website_id;
	}
}