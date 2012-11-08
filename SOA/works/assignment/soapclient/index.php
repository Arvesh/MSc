<?php

require_once 'config.php';
/* ini_set("soap.wsdl_cache_enabled", "1"); */
$timer = new timer();

$timer->start();

$soapClient = new SoapClient(WSDL);
$result = $soapClient->loop(1000);

echo $result;
$timer->stop();


echo $timer->result();
?>