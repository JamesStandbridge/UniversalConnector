<?php 

namespace UniversalConnector\API\SendinBlue\Repository;

use UniversalConnector\API\AbstractClass\Key\AbstractRepository;
use UniversalConnector\Service\Sender\CurlSender;
use UniversalConnector\API\AbstractClass\Key\Pipe;
use UniversalConnector\API\SendinBlue\EndPoints;

class AccountRepository extends AbstractRepository {

	use EndPoints;

	public function __construct(CurlSender $HTTPservice, Pipe $pipe)
	{
		parent::__construct($HTTPservice, $pipe);
	}

	public function GET_account() {
		$account = $this->HTTPservice->GET(
			$this->pipe->getDomain(),
			$this->GET_ACCOUNT_EP(),
			array("type" => "api-key: ", "token" => $this->pipe->getAPIKey())
		);

		return json_decode(json_encode($account), true);
	}
}

//GET(string $domain, string $endpoint, string $auth, array $headers);
//POST(string $domain, string $endpoint, $body = null, array $auth = null, array $headers = [])