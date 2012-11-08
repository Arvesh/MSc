<?php

/**
 * 
 * @author Gulshan Bhaugeerothee <arvesh9@gmail.com>
 */
require_once 'config.php';

$timer = new timer();

  $timer->start();

    $value = simplexml_load_file(WSDL.'1000');
    print_r($value[0]->item[0]);

  $timer->stop();

echo $timer->result();


?>
