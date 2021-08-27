<?php
namespace UniversalConnector\API\SendinBlue\Filter;


class FilterBuilder {


	public static function build(array $filters)
	{
		$stringFilters = "?";
		foreach($filters as $filterName => $filterValue) {
			if($filterValue instanceof \DateTime) {
				$timezone = $filterValue->format("O");
				$filterValue = sprintf("%s.%s",$filterValue->format("Y-m-d\TH:i:s"),substr($timezone, 1,4));
			}

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