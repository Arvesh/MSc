<?php
require_once 'config.php';
/**
 * Description of LateBooking_Model
 *
 * @author Gulshan Bhaugeerothee
 */
class LateBooking_Model extends ALateBooking_AModel implements IOfferCreator_IModel{
    
    private $type = 'latebooking';
    
    public function processLateBookingOffer() {
        
    }

   

    public function calculate() {
        echo "late booking offer was calculated";
    }

    public function getType() {
        return $this->type;
    }
}