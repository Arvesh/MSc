<?php

/**
 * Description of DiscountNight_Model
 *
 * @author sarju dooly <elo_kaveesh@hotmail.co.uk>
 */
class DiscountNight_Model implements IDiscount_IModel{
    
    public function calculate(\Offer_Model $offer) {
        
        echo 'discount in the type of nights was calculated';
    }
    
}