<?php
require_once 'config.php';
/**
 *
 * @author Gulshan Bhaugeerothee
 */
interface IDiscount_IModel {
    
    public function calculate(Offer_Model $offer);
}
