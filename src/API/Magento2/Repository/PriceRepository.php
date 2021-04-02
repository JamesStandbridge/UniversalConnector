<?php 

namespace App\API\Magento2\Repository;

use App\API\AbstractRepository;
use App\Service\Sender\CurlSender;
use App\API\Pipe;

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