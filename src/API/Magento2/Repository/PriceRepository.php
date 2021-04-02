<?php 

namespace UniversalConnector\API\Magento2\Repository;

use UniversalConnector\API\AbstractRepository;
use UniversalConnector\Service\Sender\CurlSender;
use UniversalConnector\API\Pipe;

class PriceRepository extends AbstractRepository {

	public function __construct(CurlSender $HTTPservice, Pipe $pipe)
	{
		parent::__construct($HTTPservice, $pipe);
	}

	public function hello() {
		echo "hello";
	}
}

//GET(string $domain, string $endpoint, string $auth, array $headers);