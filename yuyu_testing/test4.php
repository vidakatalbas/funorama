<?php
// Setup and connect the soap client object
//try{
	$arg=array('LoginHeader'=>array(
	'username'=>'tra153',
	'password'=>'111111',
	'Culture'=>'en_US',
	'Version'=>'8.0'
	),
	$options = array( 
	'soap_version'=>SOAP_1_2, 
	'exceptions'=>true, 
	'trace'=>1, 
	'cache_wsdl'=>WSDL_CACHE_NONE 
	));
    $sc = @new SoapClient('http://destservices.touricoholidays.com/DestinationsService.svc?wsdl',$arg);
	
	$args = array(
	'Continent'=>'Europe',
	'Country'=>'Spain',
	'State'=>'',
	'City'=>'Madrid',
	'Providers'=>array('ProviderType'=>'Default'),
	'StatusDate'=>'2013-06-11'
	);
	$rs = $sc->__soapCall('GetDestination',array('Destination'=>$args));
	print('<h2>Functions described in wsdl</h2><br\>');
	foreach($sc->__getFunctions() as $key => $value){
		echo "$key => $value <br/>";
	}
	 
	print('<h2>Types described in wsdl</h2><br\>');
	foreach($sc->__getTypes() as $key => $value){
		echo "$key => $value <br/>";
	}
//} catch (Exception $e) {
//    echo $e->getMessage();
//}
 
// Query the soap webservice
//$result = $sc->CountryISOCode(array('sCountryName' => $country{'name'}));
//$result = $sc->FullCountryInfo( array(sCountryISOCode => $result->CountryISOCodeResult));

// Output the Json code
//echo json_encode($result->FullCountryInfo);
?>