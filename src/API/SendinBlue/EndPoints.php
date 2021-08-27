<?php 

namespace UniversalConnector\API\SendinBlue;

trait EndPoints {
	public function GET_ACCOUNT_EP() {return "/account";}
	public function GET_ALL_CONTACTS_EP() {return "/contacts";}
	public function POST_CONTACT_EP() {return "/contacts";}
	public function POST_CONTACTS_EP() {return "/contacts/import";}
	public function DELETE_CONTACT_EP(string $identifier) {return sprintf("/contacts/%s", $identifier);}
	public function UPDATE_CONTACT_EP(string $identifier) {return sprintf("/contacts/%s", $identifier);}
}
