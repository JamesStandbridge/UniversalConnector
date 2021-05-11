<?php
namespace UniversalConnector\API\Magento2\Filter;


class FilterBuilder {


	public static function build(array $filters)
	{
		$stringFilters = "?";
		$i = 0;
		foreach($filters['filterGroups'] as $groupIndex => $filterGroup) {
			foreach($filterGroup as $filterListIndex => $filtersList) {
				foreach($filtersList as $filterIndex => $filter) {
					foreach($filter as $filterType => $filterValue) {
						if($i !== 0) $stringFilters .= "&";
						$stringFilters .= "searchCriteria[filterGroups][$groupIndex][$filterListIndex][$filterIndex][$filterType]=$filterValue";
						$i++;
					}
				}
			}
		}
		return $stringFilters;
	}
}

// searchCriteria => [
//   'filterGroups' => [
//     0 => [
//       'filters' => [
//          0 => [
//            'field' => 'category_gear',
//            'value' => '86',
//            'condition_type' => 'finset'
//          ]
//       ]
//     ]
//   ]
//   
// searchCriteria[filterGroups][0][filters][0][field]=entity_type_id&searchCriteria[filterGroups][0][filters][0][value]=4&searchCriteria[filterGroups][0][filters][0][condition_type]=eq