<?php

require 'vendor/autoload.php';

use App\API\Magento2\Magento2API;
use App\Service\Sender\CurlSender;
use App\API\APIProvider;




$api = APIProvider::Magento2Instance();
$api->initialize("sgagence", "Boeki2019@", "https://www.centrale-ethnique.com");
$api->postTierPrice();