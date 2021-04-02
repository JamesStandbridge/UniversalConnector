<?php

require 'vendor/autoload.php';


use UniversalConnector\API\APIProvider;

$api = APIProvider::Magento2Instance();
$api->initialize("sgagence", "Boeki2019@", "https://www.centrale-ethnique.com");
$api->postTierPrice();