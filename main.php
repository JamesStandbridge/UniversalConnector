<?php

require 'vendor/autoload.php';


use UniversalConnector\API\APIProvider;

$api = APIProvider::Magento2Instance();
$api->initialize("username", "password", "http://example.com");

$tierPrices = [
	{
		"price": 0,
		"price_type": "string",
		"website_id": 0,
		"sku": "string",
		"customer_group": "string",
		"quantity": 0,
		"extension_attributes": {}	
	}
]	

$response = $api->POST_tierPrices($tierPrices);