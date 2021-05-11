<?php 


namespace UniversalConnector\API\Magento2;

use UniversalConnector\API\AbstractAPI;
use UniversalConnector\API\Exception\PipeException;

use UniversalConnector\API\Magento2\Context;
use UniversalConnector\API\Magento2\Magento2Pipe;
use UniversalConnector\API\Magento2\EndPoints;
use UniversalConnector\API\Magento2\RepositoryProvider;

use UniversalConnector\Service\Sender\CurlSender;

class Magento2API extends AbstractAPI {
	use EndPoints;

	private $repoProvider;

	public function __construct(
		CurlSender $HTTPservice, 
		RepositoryProvider $provider
	) 
	{
		$this->repoProvider = $provider;
		$this->context = new Context();
		parent::__construct($HTTPservice);
	}

	public function POST_attribute_option(string $attributeCode, string $optionValue)
	{
		$optionData = array(
			'label' => $optionValue,
			'value' => '',
		);
		$repository = $this->repoProvider->getRepository('attribute', $this->pipe);
		$option = $repository->POST_attribute_option($attributeCode, $optionData);
		return intVal($option["content"]);
	}

	public function GET_attribute_option(string $attributeCode, string $optionValue) : ?int
	{
		$repository = $this->repoProvider->getRepository('attribute', $this->pipe);

		$filters = ["filterGroups" => [
			[
				"filters" => [
					[
						"field" => "label",
						"value" => $optionValue,
						"condition_type" => "eq"
					]
				]
			]
		]];

		$options = $repository->GET_attribute_option($attributeCode, $filters);
		$options = $options["content"];

		foreach($options as $option) {
			if($option["label"] === $optionValue) return intVal($option["value"]);
		}
		return null;
	}

	public function POST_source_items(array $sourceItems)
	{
		$repository = $this->repoProvider->getRepository('source', $this->pipe);
		return $repository->POST_source_items($sourceItems);
	}

	public function GET_product(string $sku) 
	{
		$repository = $this->repoProvider->getRepository('product', $this->pipe);
		return $repository->GET_product($sku);
	}

	public function POST_product(array $productData, string $store_code) 
	{
		$repository = $this->repoProvider->getRepository('product', $this->pipe);
		return $repository->POST_product($productData, $store_code);
	}


	public function POST_tierPrices(array $tierPrices) 
	{
		$repository = $this->repoProvider->getRepository('price', $this->pipe);
		return $repository->POST_tierPrices($tierPrices);
	}

	/**
	 * Context 
	 */
	public function setWebsite(int $website_id) 
	{
		$this->context->setWebsiteID($website_id);
	}

	/**
	 * SECURITY
	 */
    public function initialize(string $username, string $password, string $domain) 
    {
		$this->initPipe($username, $password);
        $this->openPipe($domain);
    }


    public function ping(string $domain, string $username, string $password)
    {
		$response = $this->HTTPservice->POST(
			$domain,
			$this->GET_TOKEN_EP(),
			array("username" => $username, "password" => $password)
		);    	

		return $response;
    }

	protected function initPipe(string $username, string $password)
	{
		$this->pipe = new Magento2Pipe($username, $password);	
	}

	protected function openPipe(string $domain) 
	{
		$this->pipe->setDomain($domain);

		try {
			$this->invokeToken();
		} catch (PipeException $e) {

			//@Todo: logs
			var_dump($e);
		}
	}

	private function invokeToken()
	{
		$response = $this->HTTPservice->POST(
			$this->pipe->getDomain(),
			$this->GET_TOKEN_EP(),
			array("username" => $this->pipe->getUsername(), "password" => $this->pipe->getPassword())
		);

		if($response['code'] !== 200)
		{
			if(!$response['content']) throw new PipeException("Domain not responding");
			throw new PipeException($response["content"]->message);
		}

		$this->pipe->setToken($response["content"]);
	}
}