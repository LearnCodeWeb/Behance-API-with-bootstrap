<?php
	//Constant define
	const HOME_URL	=	'http://localhost/behance/';
	
	//Behance lib include
	include_once("custom/lib/behance/Client.php");
	include_once("custom/lib/behance/ApiException.php");
	
	$client_id		=	'CDE4h183exq2KsymA02qhHZU3DUvvW4e';
	$behanceData	=	new BehanceZ\Client($client_id);
	
?>