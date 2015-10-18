<?php 
$wsdl = "http://msruwsynechron.msrenewal.com/MSREvaluatorService.svc?wsdl";
	$client = new SoapClient($wsdl, array('trace' => 1));
	
		$client->soap_defencoding = 'UTF-8';
	
	$wrapper->sUsername ='JSHERWOOD';
	$response = $client->__soapCall("GetBidLists",array($wrapper));
	
			echo '<h2>Result</h2><pre>';
			print_r($response);
			echo '</pre>';
?>
			