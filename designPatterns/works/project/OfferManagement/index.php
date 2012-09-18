<?php

require_once 'config.php';


/* @var $discount object */
$discount = Discount_Model::getInstance();



echo $discount->calculate(new ArrayObject, 'amounT');
?>
