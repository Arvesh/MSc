<?php
require_once 'config.php';
/**
 * Description of DiscountPercentage_Model
 *
 * @author sarju dooly <elo_kaveesh@hotmail.co.uk>
 */
class DiscountPercentage_Model implements IDiscount_IModel{
    
    public function calculate(\Offer_Model $offer) {
        
        echo 'percentage discount was calculated';
    }
}