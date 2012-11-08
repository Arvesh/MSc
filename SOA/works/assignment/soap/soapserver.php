<?php
// Pull in the NuSOAP code
require_once('lib/nusoap.php');
// Create the server instance
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('soapserver', 'urn:soapserver');
// Register the method to expose

$server->register('loop',
        array('totalTimes'=>'xsd:int'),
        array('return'=>'xsd:string'),
        'urn:soapserver',
        'url:soapserver#loop',
        'rpc',
        'encoded',
        'return a certain number of string'
        );
function loop($totalTimes){
  $toReturn = null;
 for($i=0;$i<=$totalTimes;$i++)
    $toReturn .= '-+';
 
  return $toReturn;
}
// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>