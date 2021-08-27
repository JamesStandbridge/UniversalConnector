
# Boeki UniversalConnector

UniversalConnector is a native PHP library allowing the instantiation of a multitude of common APIs on the market. The library is updated regularly with the contribution of new instances and new methods within the API.

## Versions

| Versions | Date | Features |
| --- | --- | --- |
| v1.0.0 | 06/04/2021 | Magento2 API |
| v2.0.0 | 27/08/2021 | SendinBlue API |

## Requirements

- `php >=5.3.0`

## Installation

```bash
# composer
composer require boeki/universal-connector
```

## Usage

### Instantiating the desired API class

```php
# Magento
$api = APIProvider::Magento2Instance();

# SendinBlue
$api = APIProvider::SendinBleuInstance();
```

### Initialization of the connection pipe

```php
# Magento
$api->initialize("username", "password", "http://example.com");

# SendinBlue
$api->initialize("xkeysib-5bbxxxxxxxxxxxxxxxx");
```

Optional: you can provide a default website ID for the next request for Magento2
```php
# Magento
$api->setWebsite($website_id);
```
### Request examples

```php

# SendinBlue
use UniversalConnector\API\APIProvider;
use UniversalConnector\API\SendinBlue\Builder\SendinBlueTools;

$api = APIProvider::SendinBleuInstance();
$api->initialize("xkeysib-5bbxxxxxxxxxxxxxxxx");

$fileBody = SendinBlueTools::CONTACTS_FILE_BODY(
	["EMAIL","NOM","PRENOM","SMS"],
	[
		["james@example.com","Standbridge","James","972542116060"],
		["Vanessa@example.com","Lucas","Vanessa","972542116061"],
		["Arthur@example.com","Arnold","Arthur","972542116063"]
	]
);


$response = $api->POST_contacts(
	$fileBody, 
	null, 
	["listName" => "Universal-connector_list_test", "folderId" => 9],
	true, 
	false, 
	null, 
	false, 
	false
);
```


## Magento2 methods

| HTTP | Method | Arguments | Description |
| --- | --- | --- | --- | 
| POST | POST_tierPrices | array tierPrices | Add or update product prices. If any items will have invalid price, price type, website id, sku, customer group or quantity, they will be marked as failed and excluded from update list and \Magento\Catalog\Api\Data\PriceUpdateResultInterface[] with problem description will be returned. If there were no failed items during update empty array will be returned. If error occurred during the update exception will be thrown. |

## SendinBlue methods

| HTTP | Method | Arguments | Description |
| --- | --- | --- | --- | 
| GET | GET_all_contacts | int limit = 50,<br> int offset = 0,<br> string sort = "desc",<br> \DateTime modifiedSince = null | Get all contacts with pagination filters |
| POST | POST_contact | string email,<br> array attributes,<br> array listIds,<br> bool updateEnabled,<br> bool emailBlacklisted,<br> bool smsBlacklisted | Post one contact |
| POST | POST_contacts | string fileBody,<br> array listIds = null,<br> array newList = null,<br> bool updateExistingContacts = true,<br> bool emptyContactsAttributes = false,<br> string notifyUrl = null,<br> bool emailBlacklist = false,<br> bool smsBlacklist = false | Import multiple contacts from an FileBody CSV style |
| PUT | UPDATE_contact | string identifier,<br>array attributes = null,<br> bool emailBlacklisted = null,<br> bool smsBlacklisted = null | Update attribute and RGPD of one contact. Identifier can be the email or the contact's system ID |
| DELETE | DELETE_contact | string identifier | Delete one contact from the SendinBlue database. Identifier can be the email or the contact's system ID |
| GET | GET_account | N\A | Get current API Key account informations |
