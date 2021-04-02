<?php

require 'vendor/autoload.php';


use UniversalConnector\API\APIProvider;

$api = APIProvider::Magento2Instance();
$api->initialize("");
$api->postTierPrice();