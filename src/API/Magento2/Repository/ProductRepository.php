<?php 

namespace UniversalConnector\API\Magento2\Repository;

use UniversalConnector\API\AbstractRepository;
use UniversalConnector\Service\Sender\CurlSender;
use UniversalConnector\API\Pipe;
use UniversalConnector\API\Magento2\Filter\FilterBuilder;

class ProductRepository extends AbstractRepository {

	public function __construct(CurlSender $HTTPservice, Pipe $pipe)
	{
		parent::__construct($HTTPservice, $pipe);
	}

	/**
	 * POST product to Magento2 Endpoint
	 * @param array $productData
	 * @param array|null $filters
	 * 
	 * @return Website response
	 */
	public function POST_product(array $productData, string $store_code, array $filters = null) 
	{
		$endPoint = $this->POST_PRODUCT_EP($store_code);
		if($filters) $endPoint .= FilterBuilder::build($filters);

		$response = $this->HTTPservice->POST(
			$this->pipe->getDomain(),
			$endPoint,
			array("product" => $productData),
			array("type" => "Authorization: Bearer ", "token" => $this->pipe->getToken())
		);

		return $response;
	}

	/**
	 * GET product from an Magento2 EndPoint
	 * @param string     $sku    
	 * @param array|null $filters 
	 */
	public function GET_product(string $sku, array $filters = null) 
	{
		$endPoint = $this->GET_PRODUCT_EP($sku);
		if($filters) $endPoint .= FilterBuilder::build($filters);

		$product = $this->HTTPservice->GET(
			$this->pipe->getDomain(),
			$endPoint,
			array("type" => "Authorization: Bearer ", "token" => $this->pipe->getToken())
		);

		return json_decode(json_encode($product), true);	
	}
}

//GET(string $domain, string $endpoint, string $auth, array $headers);
//POST(string $domain, string $endpoint, $body = null, array $auth = null, array $headers = [])