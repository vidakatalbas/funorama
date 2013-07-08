<?php
$URL = 'http://www.nanonull.com/TimeService/TimeService.asmx';

$client = new SoapClient(null, array(
    'location' => $URL,
    'uri'      => "http://www.Nanonull.com/TimeService/",
    'trace'    => 1,
    ));

$rs = $client->__soapCall("getTimeZoneTime",
   array(new SoapParam('ZULU', 'ns1:timezone')),
   array('soapaction' => 'http://www.Nanonull.com/TimeService/getTimeZoneTime')
);
print_r($rs);
?>