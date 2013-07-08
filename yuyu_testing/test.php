<?php
class HotelIdInfo{
	var $id;
	public function __construct($id){
		$this->id=$id;
	}
}
class RoomInfo{
	var $AdultNum;
	var $ChildNum;
	var $ChildAges=array();
	public function __construct($adult){
		$this->AdultNum=$adult;
	}
}
class Header{
	var $LoginName;
	var $Password;
	var $Culture;
	var $Version;
	public function __construct(){
		$this->LoginName='tra153';
		$this->Password='111111';
		$this->Culture='en_US';
		$this->Version='8.0';
	}
}
try{
	$url = 'http://demo-hotelws.touricoholidays.com/HotelFlow.svc?wsdl';
	$arg=new SoapHeader($url,'AuthenticationHeader',array(new Header()));
    $sc = @new SoapClient($url,array('trace' => true));
	$sc->__setSoapHeaders(array($arg));
	
	/*
	print('<h2>Functions described in wsdl</h2><br\>');
	foreach($sc->__getFunctions() as $key => $value){
		echo "$key => $value <br/>";
	}
	 
	print('<h2>Types described in wsdl</h2><br\>');
	foreach($sc->__getTypes() as $key => $value){
		echo "$key => $value <br/>";
	}
	*/

	$args = array(
		'HotelIdsInfo'=>array(new HotelIdInfo('2205')),
		'CheckIn'=>'2013-06-10',
		'CheckOut'=>'2013-06-13',
		'RoomsInformation'=>array('RoomInfo'=>array(new RoomInfo('1'))),
		'MaxPrice'=>'10000',
		'StarLevel'=>'3',
		'AvailableOnly'=>'false'
	);
	
	$rs = $sc->__soapCall('SearchHotelsById',array('searchRequest'=>$args));
} catch (Exception $e) {
    echo $e->getMessage();
}
 
// Query the soap webservice
//$result = $sc->CountryISOCode(array('sCountryName' => $country{'name'}));
//$result = $sc->FullCountryInfo( array(sCountryISOCode => $result->CountryISOCodeResult));

// Output the Json code
//echo json_encode($result->FullCountryInfo);
?>