<?php 


namespace UniversalConnector\API\MailChimp;

use UniversalConnector\API\AbstractClass\Key\AbstractAPI;
use UniversalConnector\API\Exception\PipeException;

use UniversalConnector\API\MailChimp\MailChimpPipe;
use UniversalConnector\API\MailChimp\EndPoints;
use UniversalConnector\API\MailChimp\RepositoryProvider;

use UniversalConnector\Service\Sender\CurlSender;

class MailChimpAPI extends AbstractAPI {
	use EndPoints;

	const ROOT_URL = "https://%s.api.mailchimp.com/3.0";

	private RepositoryProvider $repoProvider;

	public function __construct(
		CurlSender $HTTPservice, 
		RepositoryProvider $provider
	) 
	{
		$this->repoProvider = $provider;
		parent::__construct($HTTPservice);
	}

	public function GET_lists()
	{
		$repository = $this->repoProvider->getRepository('list', $this->pipe);

		$lists = $repository->GET_lists();

		return $lists;
	}

	public function ping()
	{
		$repository = $this->repoProvider->getRepository('security', $this->pipe);

		$response = $repository->ping();

		return $response;
	}

	/**
	 * SECURITY
	 */
    public function initialize(string $apiKey)
    {
		$this->initPipe($apiKey, self::ROOT_URL);
    }

	protected function initPipe(string $apiKey, string $domain)
	{
		$this->pipe = new MailChimpPipe("Basis $apiKey", sprintf($domain, self::FIND_DC($apiKey)));
	}

	private static function FIND_DC(string $apiKey) : string
	{
		$exploded = explode('-', $apiKey);
		return $exploded[1];
	}
}