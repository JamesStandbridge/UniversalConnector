<?php 


namespace UniversalConnector\API\SendinBlue;

use UniversalConnector\API\AbstractClass\Key\AbstractAPI;
use UniversalConnector\API\Exception\PipeException;

use UniversalConnector\API\SendinBlue\SendinBluePipe;
use UniversalConnector\API\SendinBlue\EndPoints;
use UniversalConnector\API\SendinBlue\RepositoryProvider;

use UniversalConnector\Service\Sender\CurlSender;

class SendinBlueAPI extends AbstractAPI {
	use EndPoints;

	const ROOT_URL = "https://api.sendinblue.com/v3";

	private RepositoryProvider $repoProvider;

	public function __construct(
		CurlSender $HTTPservice, 
		RepositoryProvider $provider
	) 
	{
		$this->repoProvider = $provider;
		parent::__construct($HTTPservice);
	}


	public function GET_account() : array
	{
		$repository = $this->repoProvider->getRepository('account', $this->pipe);

		$response = $repository->GET_account();

		return $response;
	}

	public function DELETE_contact(string $identifier) : array
	{
		$repository = $this->repoProvider->getRepository('contact', $this->pipe);
		return $repository->DELETE_contact(str_replace("@", "%40", $identifier));
	}

	public function UPDATE_contact(string $identifier, array $attributes = null, bool $emailBlacklisted = null, bool $smsBlacklisted = null) : array
	{
		$repository = $this->repoProvider->getRepository('contact', $this->pipe);

		$httpbody = [];
		if($attributes)
			$httpbody['attributes'] = $attributes;
		if($emailBlacklisted)
			$httpbody['emailBlacklisted'] = $emailBlacklisted;
		if($smsBlacklisted)
			$httpbody['smsBlacklisted'] = $smsBlacklisted;
		$response = $repository->UPDATE_contact(str_replace("@", "%40", $identifier), $httpbody);

		return $response;
	}

	public function POST_contact(string $email, array $attributes, array $listIds, bool $updateEnabled, bool $emailBlacklisted, bool $smsBlacklisted) : array
	{
		$repository = $this->repoProvider->getRepository('contact', $this->pipe);

		$httpbody = array(
			"attributes" => $attributes,
			"listIds" => $listIds,
			"updateEnabled" => $updateEnabled,
			"email" => $email,
			"emailBlacklisted" => $emailBlacklisted,
			"smsBlacklisted" => $smsBlacklisted
		);

		$response = $repository->POST_contact($httpbody);

		return $response;
	}

	public function POST_contacts(string $fileBody, array $listIds = null, array $newList = null, bool $updateExistingContacts = true, bool $emptyContactsAttributes = false, string $notifyUrl = null, bool $emailBlacklist = false, bool $smsBlacklist = false) : array
	{
		$repository = $this->repoProvider->getRepository('contact', $this->pipe);

		$httpbody = array(
			"emailBlacklist" => $emailBlacklist,
			"smsBlacklist" => $smsBlacklist,
			"updateExistingContacts" => $updateExistingContacts,
			"emptyContactsAttributes" => $emptyContactsAttributes,
			"fileBody" => $fileBody,
			"notifyUrl" => $notifyUrl
		);

		if($listIds)
			$httpbody["listIds"] = $listIds;
		else
			$httpbody["newList"] = $newList;

		$response = $repository->POST_contacts($httpbody);

		return $response;
	}

	public function GET_all_contacts(int $limit = 50, int $offset = 0, string $sort = "desc", \DateTime $modifiedSince = null) : array
	{
		$repository = $this->repoProvider->getRepository('contact', $this->pipe);

		$filters = array(
			"limit" => $limit,
			"offset" => $offset,
			"sort" => $sort
		);

		if($modifiedSince)
			$filters['modifiedSince'] = $modifiedSince;

		$response = $repository->GET_all_contacts($filters);
		$account = $response["content"];

		return $account;
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
		$this->pipe = new SendinBluePipe($apiKey, $domain);	
	}
}