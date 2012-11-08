<?php
/*=================SOAP CLIENT==================*/
require_once 'timer.php';
$data['WSDL'] = 'http://my.development.com/MSE/SOA/works/assignment/soap/soapserver.php?wsdl';

foreach($data as $key=>$value)
  define($key, $value);

?>
