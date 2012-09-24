<?php

/**
 * Description of OfferFactory_AModel
 *
 * @author Gulshan Bhaugeerothee
 */
abstract class OfferFactory_AModel {
    
    public abstract function createHoneymoonersOffer();
    
    public abstract function createEarlyBookingOffer();
    
    public abstract function createLateBookingOffer();
}