<?php 

namespace UniversalConnector\API;

use UniversalConnector\API\Magento2\Magento2API;
use UniversalConnector\Service\Sender\CurlSender;
use UniversalConnector\API\Magento2\RepositoryProvider;

class APIProvider {
	public static function Magento2Instance() : Magento2API {
		$sender = new CurlSender();
		$repoProvider = new RepositoryProvider($sender);
		return new Magento2API($sender, $repoProvider);
	}
}