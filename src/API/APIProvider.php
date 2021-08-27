<?php 

namespace UniversalConnector\API;

use UniversalConnector\API\Magento2\Magento2API;
use UniversalConnector\API\Magento2\RepositoryProvider as Magento2RepositoryProvider;

use UniversalConnector\API\SendinBlue\SendinBlueAPI;
use UniversalConnector\API\SendinBlue\RepositoryProvider as SendinBleuRepositoryProvider;

use UniversalConnector\Service\Sender\CurlSender;


class APIProvider {
	public static function Magento2Instance() : Magento2API {
		$sender = new CurlSender();
		$repoProvider = new Magento2RepositoryProvider($sender);
		return new Magento2API($sender, $repoProvider);
	}

	public static function SendinBleuInstance() : SendinBlueAPI {
		$sender = new CurlSender();
		$repoProvider = new SendinBleuRepositoryProvider($sender);
		return new SendinBlueAPI($sender, $repoProvider);
	}
}