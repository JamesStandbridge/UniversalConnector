<?php

require 'vendor/autoload.php';


use UniversalConnector\API\APIProvider;

use UniversalConnector\API\SendinBlue\Builder\SendinBlueTools;

//MAGENTO2

/*$api = APIProvider::Magento2Instance();
$api->initialize("zist", "SGagence2015@", "https://preprod.gn6per.boeki.fr");

print_r($api);*/



//SENDINBLUE

/*$api = APIProvider::SendinBleuInstance();
$api->initialize("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");
*/

/*var_dump($api->POST_contact(
	"james@fff.com", 
	array(
		"NOM" => "Standbridge",
		"PRENOM" => "James",
		"SMS" => "972542116262"
	), 
	[36], 
	false, 
	true, 
	true
));*/

/*var_dump($api->DELETE_contact("james@fff.com"));*/
//var_dump($api->GET_all_contacts(10, 0, "desc", new \DateTime()));

/*$fileBody = SendinBlueTools::CONTACTS_FILE_BODY(
	["EMAIL","NOM","PRENOM","SMS"],
	[
		["james@fff.com","Standbridge","James","972542116060"],
		["robert@fff.com","Standbridge","Robert","972542116061"],
		["baptiste@fff.com","Lucas","Baptiste","972542116063"]
	]
);


var_dump($api->POST_contacts(
	$fileBody, 
	null, 
	["listName" => "Universal-connector_list_test", "folderId" => 9],
	true, 
	false, 
	null, 
	false, 
	false
));*/

/*var_dump($api->UPDATE_contact(
	"james@fff.com", 
	array(
		"NOM" => "Lucas",
	)
));*/