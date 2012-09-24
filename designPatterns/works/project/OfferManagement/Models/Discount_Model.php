<?php

require_once 'config.php';

/**
 * Description of Discount_Model
 *
 * @author Gulshan Bhaugeerothee
 */
class Discount_Model implements IDiscount_IModel {

  private static $instance;

  public function __construct() {
    
  }

  public function calculate(\ArrayObject $array, $type = null) {

    switch (strtolower($type)) {
      case 'percentage':
        return $this->calcPercentage($array);
        break;
      case 'amount':
        return $this->calcAmount($array);
        break;
      default :
        return $this->calcNight($array);
        break;
    }
  }

  public function calcAmount(\ArrayObject $array) {
    return 'calculate amount'.$array;
  }

  public function calcPercentage(\ArrayObject $array) {

    return 'calculate percentage'.$array;
  }

  public function calcNight(\ArrayObject $array) {
    return 'calculate night'.$array;
  }

  public static function getInstance() {

    if (self::$instance === NULL) {

      self::$instance = new Discount_Model();
    }
    return self::$instance;
  }

}