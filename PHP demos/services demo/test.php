<?php

$uname->sUsername='JSHERWOOD';
$client = new SoapClient("http://msruwsynechron.msrenewal.com/MSREvaluatorService.svc?wsdl",array('trace' => 1) );  
// $r=$client->__getFunctions();
$r= $client->__getTypes();
//print_r($r);
//exit;
$result = $client->__soapCall('GetBidLists',array('parameters' => $uname));
echo "<pre>";
print_r($result);
echo "</pre>";
exit;
$arrProps[0]=SamplePropety_Valid();

$oBidList=array(
"Name" => "New Test",
"UserName" => "JSHERWOOD", //broker username
"Items"=>$arrProps
);  
echo "<pre>";   
print_r($oBidList);	
  echo "</pre>";
 // exit;
$oOptions='';

function SamplePropety_Valid()
{
	   $sMLS = "5066572";
	   $sSubdivision = "Country View";
       $sStreet = "50 Hoglen Drive";
       $sCity = "Covington";
       $sCounty = "Newton";
       $sState = "GA";
       $sZipcode = "30016";
       $sPropertyType = "Single Family";
       $iYearBuilt = 1992;
       $iSquareFeet = 1516;
       $iTotalUnits = 1;
       $iBeds = 3;
       $dBaths = 2.0;
       $iEstDaysToLease = 30;
       $dListingPrice = 88900;
       $dPropValue = 75000;
       $dRent = 1100;
       $dTaxes = 1376;
       $dHOA = null;
       $dRepairs = 800;
       $sComments = "FNMA that has new paint, carpet, appliances, and has nice front porch and screened rear porch. Needs a refrige.";
       $bOccupied = false;
       $bLeased = false;
       $iDOM = 34;
       $sCounterparty = "Fannie Mae";
       $sProgram = "Homepath";
       $sBrokerName = "John Sherwood";

        return CreateProperty($sStreet, $sCity, 
        $sState, $sZipcode, $sPropertyType, $iYearBuilt, $iSquareFeet, $iTotalUnits,
            $iBeds, $dBaths, $sProgram, $sMLS, $sSubdivision, $sCounty, $iEstDaysToLease, $dListingPrice, $dPropValue, 
            $dRent,$sBrokerName, $dTaxes, $dHOA, $dRepairs, $sComments, $bOccupied, $bLeased, $iDOM, $sCounterparty);
}



function CreateProperty($sStreet, $sCity, 
        $sState, $sZipcode, $sPropertyType, $iYearBuilt, $iSquareFeet, $iTotalUnits,
            $iBeds, $dBaths, $sProgram, $sMLS, $sSubdivision, $sCounty, $iEstDaysToLease, $dListingPrice, $dPropValue, 
            $dRent,$sBrokerName, $dTaxes, $dHOA, $dRepairs, $sComments, $bOccupied, $bLeased, $iDOM, $sCounterparty)
{
	$oProperty->BidListPropertyId =empty($sMLS) ? "1" : $sMLS;
        $oProperty->Address->Street = $sStreet;
        $oProperty->Address->City = $sCity;
        $oProperty->Address->State = $sState;
        $oProperty->Address->Zipcode = $sZipcode;
        $oProperty->PropertyType = $sPropertyType;
        $oProperty->YearBuilt = $iYearBuilt;
        $oProperty->SquareFeet = $iSquareFeet;
        $oProperty->TotalUnits = $iTotalUnits;
        $oProperty->Beds = $iBeds;
        $oProperty->Baths = $dBaths;
        $oProperty->blpProgram = $sProgram;
        $oProperty->MLS = $sMLS;
        $oProperty->Subdivision = $sSubdivision;
        $oProperty->Address->County = $sCounty;
        $oProperty->blpEstDaysToLease = $iEstDaysToLease;
        $oProperty->ListingPrice = $dListingPrice;
        $oProperty->Broker->PropValue = $dPropValue;
        $oProperty->Broker->Rent = $dRent;
        $oProperty->Broker->Name = $sBrokerName;

        $oProperty->CIO->PropValue = $dPropValue;
		$oProperty->CIO->Rent = $dRent;
		$oProperty->CIO->Taxes = $dTaxes;
		$oProperty->CIO->HOA = $dHOA;
		$oProperty->CIO->Repairs = $dRepairs;
		$oProperty->CIO->Comments = $sComments;

        $oProperty->blpOccupied = $bOccupied;
        $oProperty->blpLeased = $bLeased;
        $oProperty->blpDOM = $iDOM;
        $oProperty->blpCounterparty = $sCounterparty;      	

        return $oProperty;
}


$res=$client->CreateBidList(array('oBidList' => $oBidList,'oOptions' =>$oOptions))->CreateBidListResult;
echo "<pre>";
print_r($res);
echo "</pre>";

?>
 