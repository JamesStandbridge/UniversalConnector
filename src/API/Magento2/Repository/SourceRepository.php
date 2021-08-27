<?php 

namespace UniversalConnector\API\Magento2\Repository;

use UniversalConnector\API\AbstractClass\Bearer\AbstractRepository;
use UniversalConnector\Service\Sender\CurlSender;
use UniversalConnector\API\AbstractClass\Bearer\Pipe;
use UniversalConnector\API\Magento2\Filter\FilterBuilder;
use UniversalConnector\API\Magento2\EndPoints;

class SourceRepository extends AbstractRepository {

	use EndPoints;
	
	public function __construct(CurlSender $HTTPservice, Pipe $pipe)
	{
		parent::__construct($HTTPservice, $pipe);
	}

	public function POST_source_items(array $sourceItems, array $filters = null) 
	{
		$endPoint = $this->POST_SOURCE_ITEMS_EP();
		if($filters) $endPoint .= FilterBuilder::build($filters);

		$response = $this->HTTPservice->POST(
			$this->pipe->getDomain(),
			$endPoint,
			array("sourceItems" => $sourceItems),
			array("type" => "Authorization: Bearer ", "token" => $this->pipe->getToken())
		);

		return $response;
	}
}

//GET(string $domain, string $endpoint, string $auth, array $headers);
//POST(string $domain, string $endpoint, $body = null, array $auth = null, array $headers = [])