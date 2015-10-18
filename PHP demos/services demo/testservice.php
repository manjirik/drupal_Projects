<?php

	require_once 'lib/nusoap.php';
	$proxyhost = '';
	$proxyport = '';
	$proxyusername = '';
	$proxypassword = '';
	$client = new nusoap_client('http://msruwsynechron.msrenewal.com/MSREvaluatorService.svc?wsdl', true, $proxyhost, $proxyport, $proxyusername, $proxypassword);
	$err = $client->getError();
	$client->soap_defencoding = 'UTF-8';
	if ($err) {
		echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
	}

	$header = '<GetBidLists xmlns="http://tempuri.org/"></GetBidLists>';
	$result = $client->call('GetBidLists','JSHERWOOD','','',$header);

	// Check for a fault
	if ($client->fault) {
		echo '<h2>Fault</h2><pre>';
		print_r($result);
		echo '</pre>';
	} else {
		// Check for errors
		$err = $client->getError();
		if ($err) {
			// Display the error
			echo '<h2>Error</h2><pre>' . $err . '</pre>';
		} else {
			// Display the result
			echo '<h2>Result</h2><pre>';
			print_r($result);
			echo '</pre>';
		}
	}
