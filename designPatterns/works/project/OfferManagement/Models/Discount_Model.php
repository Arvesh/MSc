<?php

require_once 'config.php';

/**
 * Description of Discount_Model
 *
 * @author Gulshan Bhaugeerothee
 */
class Discount_Model {

  private static $instance;

  private $offer;
  
  public function __construct(Offer_Model $offer) {
      
      $this->offer = $offer;
      
  }


  public static function getInstance() {

    if (self::$instance === NULL) {

      self::$instance = new Discount_Model();
    }
    return self::$instance;
  }
  
  public function calculateDiscount(IDiscount_IModel $discount){
      
      return $discount->calculate($this->offer);
      
  }
  
  

}