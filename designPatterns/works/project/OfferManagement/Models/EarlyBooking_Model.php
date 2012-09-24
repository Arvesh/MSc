<?php
require_once 'config.php';
/**
 * Description of EarlyBooking_Model
 *
 * @author Gulshan Bhaugeerothee
 */
class EarlyBooking_Model extends AEarlyBooking_AModel implements IOfferCalculator_IModel{
    
    private static $instance;
    
    public function __construct() {
        
        echo "early booking was constructed ==> constructor </br>";
    }
    
    public function processEarlyBookingOffer() {
        
    }
    
    public function calculate() {
        echo "early booking was calculated </br>";
    }
}