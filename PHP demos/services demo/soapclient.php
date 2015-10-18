<?php
	require_once 'lib/nusoap.php';

	

	/* create the client for my rpc/encoded web service */
	$wsdl = "http://msruwsynechron.msrenewal.com/MSREvaluatorService.svc?wsdl";
	// $mynamespace = "http://phonedirlux.homeip.net/types"; no more need of this...
	$client = new soapclient($wsdl, true);

	/* call readLS */
        // Let NuSoap extract the correct target namespace from the WSDL!
	$response = $client->call('GetBidLists', 'jjjjjj', '');
?>

<?=$response?>