<?php

namespace UniversalConnector\Service\Sender;

trait Methods {
	public function GET_METHOD() 
	{
		return "GET";
	}

	public function POST_METHOD()
	{
		return "POST";
	}

	public function DELETE_METHOD()
	{
		return "DELETE";
	}

	public function PUT_METHOD()
	{
		return "PUT";
	}
}