<?php 

namespace UniversalConnector\API\MailChimp;

trait EndPoints {
	public function PING_EP() {return "/ping";}
	
	public function GET_LISTS_EP() {return "/lists";}
}
