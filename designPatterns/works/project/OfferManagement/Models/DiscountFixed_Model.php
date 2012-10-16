<?php

/**
 * Description of DiscountFixed_Model
 *
 * @author sarju dooly <elo_kaveesh@hotmail.co.uk>
 */
class DiscountFixed_Model implements IDiscount_IModel{
    
    public function calculate(\Offer_Model $offer) {
        
        echo 'fixed discount calculated <br />';
    }
    
}