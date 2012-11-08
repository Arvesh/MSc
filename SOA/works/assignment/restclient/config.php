<?php
/*=======================REST CLIENT====================*/
require_once 'timer.php';
$data['WSDL'] = 'http://my.development.com/MSE/SOA/works/assignment/restserver/loop/value/number/';

foreach($data as $key=>$value)
  define($key, $value);

?>
