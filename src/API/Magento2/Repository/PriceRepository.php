<?php 

namespace UniversalConnector\API\Magento2\Repository;

use UniversalConnector\API\AbstractRepository;
use UniversalConnector\Service\Sender\CurlSender;
use UniversalConnector\API\Pipe;
use UniversalConnector\API\Magento2\Filter\FilterBuilder;

class PriceRepository extends AbstractRepository {

	public function __construct(CurlSender $HTTPservice, Pipe $pipe)
	{
		parent::__construct($HTTPservice, $pipe);
	}

	/**
	 * POST an array of Tier Prices to a Magento2 EndPoint
	 * @param array      $tierPrices 
	 * 
	 * [
	 * 		{
	 *   		price: 					0
	 *     		price_type: 			string
	 *       	website_id: 			0
	 *        	sku: 					string
	 *         	customer_group:			string
	 *          quantity:				0
	 *          extension_attributes:	{}
	 * 		},
	 *   	...
	 * ]
	 * 
	 * @param array|null $filters
	 * 
	 * @return Website response
	 */
	public function POST_TierPrices(array $tierPrices, array $filters = null) {
		$endPoint = $this->POST_TIER_PRICES();
		if($filters) $endPoint .= FilterBuilder::build($filters);

		$response = $this->HTTPservice->POST(
			$this->pipe->getDomain(),
			$endPoint,
			array("prices" => $tierPrices),
			array("type" => "Authorization: Bearer ", "token" => $this->pipe->getToken())
		);

		return $response;
	}
}

//GET(string $domain, string $endpoint, string $auth, array $headers);
//POST(string $domain, string $endpoint, $body = null, array $auth = null, array $headers = [])