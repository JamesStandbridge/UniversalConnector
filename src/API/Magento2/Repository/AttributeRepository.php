<?php 

namespace UniversalConnector\API\Magento2\Repository;

use UniversalConnector\API\AbstractRepository;
use UniversalConnector\Service\Sender\CurlSender;
use UniversalConnector\API\Pipe;
use UniversalConnector\API\Magento2\Filter\FilterBuilder;

class AttributeRepository extends AbstractRepository {

	public function __construct(CurlSender $HTTPservice, Pipe $pipe)
	{
		parent::__construct($HTTPservice, $pipe);
	}

	public function GET_attribute_option(string $attributeCode, array $filters = null) {
		$endPoint = $this->GET_ATTRIBUTE_OPTION_EP($attributeCode);
		if($filters) $endPoint .= FilterBuilder::build($filters);

		$product = $this->HTTPservice->GET(
			$this->pipe->getDomain(),
			$endPoint,
			array("type" => "Authorization: Bearer ", "token" => $this->pipe->getToken())
		);

		return json_decode(json_encode($product), true);
	}

	public function POST_attribute_option(string $attributeCode, array $optionData, $filters = null) 
	{
		$response = $this->HTTPservice->POST(
			$this->pipe->getDomain(),
			$this->POST_ATTRIBUTE_OPTION_EP($attributeCode),
			array("option" => $optionData),
			array("type" => "Authorization: Bearer ", "token" => $this->pipe->getToken())
		);

		return $response;
	}
}

//GET(string $domain, string $endpoint, string $auth, array $headers);
//POST(string $domain, string $endpoint, $body = null, array $auth = null, array $headers = [])