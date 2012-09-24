<?php
require_once 'config.php';
/**
 * Offer main class which extends the offer factory.
 * 
 *
 * @author Gulshan Bhaugeerothee
 */
class Offer_Model extends OfferFactory_AModel{
    
    private static $instance;
    
    public static function getInstance(){
        
        if (self::$instance == null){
            
            self::$instance = new Offer_Model();            
        }
        
        return self::$instance;
    }
    
    public  function  createEarlyBookingOffer() {
        
        return new EarlyBooking_Model();        
    }
    
    public function createHoneymoonersOffer() {

        return new Honeymooners_Model();
    }
    
    public function createLateBookingOffer() {
        
        return new LateBooking_Model();
    }
    
    
    public function calculateOffer(IOfferCalculator_IModel $offerCalculator) {

        return $offerCalculator->calculate();
    }
    
    
       
}