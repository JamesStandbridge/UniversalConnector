<?php 

namespace UniversalConnector\API\SendinBlue\Repository;

use UniversalConnector\API\AbstractClass\Key\AbstractRepository;
use UniversalConnector\Service\Sender\CurlSender;
use UniversalConnector\API\AbstractClass\Key\Pipe;
use UniversalConnector\API\SendinBlue\Filter\FilterBuilder;
use UniversalConnector\API\SendinBlue\EndPoints;

class ContactRepository extends AbstractRepository {

	use EndPoints;

	public function __construct(CurlSender $HTTPservice, Pipe $pipe)
	{
		parent::__construct($HTTPservice, $pipe);
	}

	public function GET_all_contacts(array $filters = null) : array
	{
		$endPoint = $this->GET_ALL_CONTACTS_EP();
		if($filters) $endPoint .= FilterBuilder::build($filters);

		$contacts = $this->HTTPservice->GET(
			$this->pipe->getDomain(),
			$endPoint,
			array("type" => "api-key: ", "token" => $this->pipe->getAPIKey())
		);

		return json_decode(json_encode($contacts), true);
	}

	public function POST_contact(array $httpbody) : array
	{
		$contact = $this->HTTPservice->POST(
			$this->pipe->getDomain(),
			$this->POST_CONTACT_EP(),
			$httpbody,
			array("type" => "api-key: ", "token" => $this->pipe->getAPIKey())
		);

		return json_decode(json_encode($contact), true);
	}

	public function POST_contacts(array $httpbody) : array
	{
		$process = $this->HTTPservice->POST(
			$this->pipe->getDomain(),
			$this->POST_CONTACTS_EP(),
			$httpbody,
			array("type" => "api-key: ", "token" => $this->pipe->getAPIKey())
		);

		return json_decode(json_encode($process), true);		
	}

	public function DELETE_contact(string $identifier) : array
	{
		$response = $this->HTTPservice->DELETE(
			$this->pipe->getDomain(),
			$this->DELETE_CONTACT_EP($identifier),
			array("type" => "api-key: ", "token" => $this->pipe->getAPIKey())
		);

		return json_decode(json_encode($response), true);
	}

	public function UPDATE_contact(string $identifier, array $httpbody) : array
	{
		$process = $this->HTTPservice->PUT(
			$this->pipe->getDomain(),
			$this->UPDATE_CONTACT_EP($identifier),
			$httpbody,
			array("type" => "api-key: ", "token" => $this->pipe->getAPIKey())
		);

		return json_decode(json_encode($process), true);
	}
}

//GET(string $domain, string $endpoint, string $auth, array $headers);
//POST(string $domain, string $endpoint, $body = null, array $auth = null, array $headers = [])