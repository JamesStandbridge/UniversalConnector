<?php 

namespace UniversalConnector\API\Magento2;

trait EndPoints {

	//GET
	public function GET_TOKEN_EP() {return "/rest/V1/integration/admin/token";}
	public function GET_PRODUCTS_EP() {return "/rest/all/V1/products";}
	public function GET_PRODUCT_EP(string $sku) {return "/rest/all/V1/products/$sku";}
	public function GET_ATTRIBUTE_OPTION_EP(string $attribute_code) {return "/rest/all/V1/products/attributes/$attribute_code/options";}
	
	//POST
	public function POST_TIER_PRICES() {return "/rest/all/V1/products/tier-prices";}
	public function POST_PRODUCT_EP(string $store_code) {return "/rest/$store_code/V1/products";}
	public function POST_SOURCE_ITEMS_EP() {return "/rest/all/V1/inventory/source-items";}
	public function POST_ATTRIBUTE_OPTION_EP(string $attributeCode) {return "/rest/all/V1/products/attributes/$attributeCode/options";}
	public function POST_CONFIGURABLE_OPTION_EP(string $sku) {return "/rest/V1/configurable-products/$sku/options";}
}
