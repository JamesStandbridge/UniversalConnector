<?php 

namespace App\API;

use App\API\Magento2\Magento2API;
use App\Service\Sender\CurlSender;
use App\API\Magento2\RepositoryProvider;

class APIProvider {
	public static function Magento2Instance() : Magento2API {
		$sender = new CurlSender();
		$repoProvider = new RepositoryProvider($sender);
		return new Magento2API($sender, $repoProvider);
	}
}