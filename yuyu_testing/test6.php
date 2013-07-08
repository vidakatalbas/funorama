<?php
$user = "tra153";
$pass = "111111";
$destino = "FrontendService_Test.wsdl";
//$destino = "http://demo-hotelws.touricoholidays.com/HotelFlow.svc?wsdl";
$objClient = new SoapClient($destino, array('trace' => true,'exceptions' => 0, 'encoding' => 'UTF-8'));
$xml = '<hb:getHotelDetail xmlns:hb="http://axis.frontend.hydra.hotelbeds.com">
<HotelDetailRQ echoToken="DummyEchoToken" xmlns="http://www.hotelbeds.com/schemas/2005/06/messages" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.hotelbeds.com/schemas/2005/06/messages HotelDetailRQ.xsd">
<Language>ENG</Language>
<Credentials>
<User>'.$user.'</User>
<Password>'.$pass.'</Password>
</Credentials>
 <HotelCode>21</HotelCode>
</HotelDetailRQ>
</hb:getHotelDetail>';


$soapvar = new SoapVar($xml, XSD_ANYXML);
$objResponse = $objClient->__soapCall("getHotelDetail", array($soapvar)); 
print_r($objClient->__getLastResponse());
//print_r($objClient);
			
?>