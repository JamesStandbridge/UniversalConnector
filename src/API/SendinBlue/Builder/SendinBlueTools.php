<?php

namespace UniversalConnector\API\SendinBlue\Builder;

class SendinBlueTools {

	public static function CONTACTS_FILE_BODY(array $headers, array $contacts) : string
	{
		$filebody = "";

		$filebody .= self::ARRAY_TO_STRING($headers);
		foreach($contacts as $contact) 
			$filebody .= sprintf("\n%s", self::ARRAY_TO_STRING($contact));

		return $filebody;
	}

	private static function ARRAY_TO_STRING(array $array) : string
	{
		$line = "";
		foreach($array as $key => $slug) {
			if($key === 0) 
				$line .= $slug;
			else
				$line .= sprintf(",%s", $slug);
		} 
		return $line;
	}
}