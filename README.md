# Boeki Bootstrap Application

## Requirements

- `php >=5.3.0`

## Installation

```shell
# composer
composer require boeki/universal-connector
```

## Usage

### Instantiating the desired API class

```php
$api = APIProvider::Magento2Instance();
```

### Initialization of the connection pipe

```php
$api->initialize("username", "password", "http://example.com");
```

Optional: you can provide a default website ID for the next request
```php
$api->setWebsite($website_id);
```

## Magento2 methods

| HTTP | Method | Arguments | Description |
| --- | --- | --- | --- | 
| POST | POST_tierPrices | array tierPrices | Add or update product prices. If any items will have invalid price, price type, website id, sku, customer group or quantity, they will be marked as failed and excluded from update list and \Magento\Catalog\Api\Data\PriceUpdateResultInterface[] with problem description will be returned. If there were no failed items during update empty array will be returned. If error occurred during the update exception will be thrown. |
