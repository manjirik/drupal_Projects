<?php
//include("nusoap.php");
class Webservice {
	public $soap_client;
	public function __construct()
	{
		$this->soap_client = new SoapClient(SKYWARDS_WS_URL);

		//Body of the Soap Header.
		$headerbody = array('AuthenticationName' => UID,
		                'AuthenticationPassword' => PWD
		                );
		//Create Soap Header.       
		$header = new SOAPHeader(NS, 'AuthenticationHeader', $headerbody);       
		
		//set the Headers of Soap Client.
		
		$this->soap_client->__setSoapHeaders($header); 
	}
		
	public function getValidateMembershipNo($params)
	{
		
		$client = new nusoap_client(SKYWARDS_WS_URL,true);
		$result = $client->call('ValidateMembershipNo',$params) ;
		return $result;
	}
	public function submitenrollmember($params)
	{
		/*$client = new nusoap_client(SKYWARDS_WS_URL,true);
		$result = $client->call('EnrollMember',$params) ;
		return $result;*/
		$soap_client = new SoapClient(SKYWARDS_WS_URL);
	
		$Uid='SKYWARDS';
		$Pwd='SKYWARDS';
		$ns = "http://skywards.com/Mercator.CRIS.WS";
		
		
		//Body of the Soap Header.
		$headerbody = array('AuthenticationName' => $Uid,
		                'AuthenticationPassword' => $Pwd
		                );
		//Create Soap Header.       
		$header = new SOAPHeader($ns, 'AuthenticationHeader', $headerbody);       
		
		//set the Headers of Soap Client.
		
		$soap_client->__setSoapHeaders($header);
		//getting correct response for below
		return($soap_client->EnrollMember($params));
		
	}
	public function validatemembershipnumber($params)
	{
		
		/*$client = new nusoap_client(SKYWARDS_WS_URL,true);
		$result = $client->call('ValidateMembershipNo',$params) ;
		return $result;*/
		
		
		//getting correct response for below
		return $this->soap_client->ValidateMembershipNo($params);
		
	}
	public function enrollmember($params)
	{
		/*$client = new nusoap_client(SKYWARDS_WS_URL,true);
		$result = $client->call('EnrollMember',$params) ;
		return $result;*/
		return $this->soap_client->EnrollMember($params);
	}

}	