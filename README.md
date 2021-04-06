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
| POST | POST_tierPrices | $tierPrices[] | List all new or modified files |
