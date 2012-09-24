<?php
require_once 'config.php';
/**
 * Description of LateBooking_Model
 *
 * @author Gulshan Bhaugeerothee
 */
class LateBooking_Model extends ALateBooking_AModel implements IOfferCalculator_IModel{
    
    public function processLateBookingOffer() {
        
    }

   

    public function calculate() {
        echo "late booking offer was calculated";
    }
}