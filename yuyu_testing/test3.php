<?php
try{
	$arg=array('Credentials'=>array(
	'User'=>'FUNORAMAPH40706',
	'Password'=>'FUNORAMAPH40706'
	));
    $sc = @new SoapClient('http://212.170.239.71/appservices/ws/FrontendService',$arg);
	 
	
	$args = array(
	//'AuthenticationHeader'=>array('LoginName'=>'tra153','Password'=>'111111','Culture'=>'en_US','Version'=>'8.0'),
	//'searchRequest'=>array(
	'HotelIdsInfo'=>array('HotelIdInfo'=>'2205'),
	'CheckIn'=>'2013-06-10',
	'CheckOut'=>'2013-06-13',
	'RoomsInformation'=>array('RoomInfo'=>array('AdultNum'=>'2')),
	'MaxPrice'=>'10000',
	'StarLevel'=>'3',
	'AvailableOnly'=>'false'
	//)
	);
	//$rs = $sc->__soapCall('SearchHotelsById',array('searchRequest'=>$args));
	
	print('<h2>Functions described in wsdl</h2><br\>');
	foreach($sc->__getFunctions() as $key => $value){
		echo "$key => $value <br/>";
	}
	 
	print('<h2>Types described in wsdl</h2><br\>');
	foreach($sc->__getTypes() as $key => $value){
		echo "$key => $value <br/>";
	}
} catch (Exception $e) {
    echo $e->getMessage();
}
 
// Query the soap webservice
//$result = $sc->CountryISOCode(array('sCountryName' => $country{'name'}));
//$result = $sc->FullCountryInfo( array(sCountryISOCode => $result->CountryISOCodeResult));

// Output the Json code
//echo json_encode($result->FullCountryInfo);
?>