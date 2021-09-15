<?php 

namespace UniversalConnector\API\MailChimp\Repository;

use UniversalConnector\API\AbstractClass\Key\AbstractRepository;
use UniversalConnector\Service\Sender\CurlSender;
use UniversalConnector\API\AbstractClass\Key\Pipe;
use UniversalConnector\API\MailChimp\EndPoints;

class ListRepository extends AbstractRepository {

	use EndPoints;

	public function __construct(CurlSender $HTTPservice, Pipe $pipe)
	{
		parent::__construct($HTTPservice, $pipe);
	}

	public function GET_lists() {
		$response = $this->HTTPservice->GET(
			$this->pipe->getDomain(),
			$this->GET_LISTS_EP(),
			array("type" => "Authorization: ", "token" => $this->pipe->getAPIKey())
		);

		return json_decode(json_encode($response), true);
	}
}

//GET(string $domain, string $endpoint, string $auth, array $headers);
//POST(string $domain, string $endpoint, $body = null, array $auth = null, array $headers = [])