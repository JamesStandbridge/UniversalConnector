<?php
namespace UniversalConnector\API\MailChimp\Filter;


class FilterBuilder {

	public static function build(array $filters)
	{
		$stringFilters = "?";
		foreach($filters as $filterName => $filterValue) {
			if(array_key_first($filters) === $filterName) 
				$stringFilters .= sprintf("%s=%s", $filterName, $filterValue);
			else
				$stringFilters .= sprintf("&%s=%s", $filterName, $filterValue);
		}
		return $stringFilters;
	}
}

/**
 * $filters = array(
 * 		"limit" => 50,
 *   	"offset" => 0,
 *    	"sort" => "desc"
 * );
 */
// ?limit=50&offset=0&sort=desc