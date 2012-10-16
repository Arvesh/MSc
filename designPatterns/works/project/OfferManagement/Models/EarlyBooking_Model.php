<?php
require_once 'config.php';
/**
 * Description of EarlyBooking_Model
 *
 * @author Gulshan Bhaugeerothee
 */
class EarlyBooking_Model extends AEarlyBooking_AModel implements IOfferCreator_IModel{
    
    private $type = 'earlybooking';
    
   
    public function processEarlyBookingOffer() {
        
    }

    
    
    public function calculate() {
        echo "early booking was calculated </br>";
    }

    public function getType() {
        
        return $this->type;
        
    }
}