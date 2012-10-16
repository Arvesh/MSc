<?php
/*
 * @author Gulshan Bhaugeerothee
 * 
 * From what i have designed , we currently have 4 main classes namely:
 * 
 * 1. Offer
 * 2. Discount
 * 3. Condition
 * 4. Market
 * 
 * DESIGN PATTERNS I HAVE PLANNED TO IMPLEMENT AND IN WHICH CLASSES :
 * 
 * (a). Offer ==> Factory pattern  + Singleton ----DONE
 * (b). Discount ==>  Strategy + Singleton ----DONE
 * (c). Condition ==> Adapter Pattern 
 * (d). Market ==> ?? -> still has to think abt it.
 * (e). MySQL Abstraction class -----------------DONE
 * 
 * 
 * 
 */
require_once 'config.php';

/*
 * PLAN 1st Oct 2012
 * 
 * Fetching all offers and displaying the values
 * 
 * $offers = Offer_Model::getInstance()->getOffer();
 * 
 * foreach($offers as $offer){
 * 
 *  $getDiscount = Discount_Model::getInstance()->getDiscount($offer->offer_id);
 * 
 *  $getCondition = Condition_Model::getInstance()->getCondition($offer->offer_id);
 * 
 *  Type : $getDiscount->type;
 *  Discount : $getDiscount->value; 
 * 
 * }
 * 
 * 
 */


/*=========TESTING OF FACTORY + SINGLETON + STRATEGY==========*/

//$offer = Offer_Model::getInstance();

new Offer_Controller();

/*================================TESTING OFFER FACTORY WITH DATABASE=============================
$earlybookingOffer = Offer_Model::getInstance()->createEarlyBookingOffer();

if ($earlybookingOffer>0){
    
    echo 'earlybooking offer was created';
    
}  else {
    
    echo 'there was a problem somewhere';
}

================================TESTING OFFER FACTORY WITH DATABASE=============================*/

    
/* @var $calculateEarlyBooking object */
 //$calculateEarlyBooking = $offer->calculateOffer($earlybookingOffer);

//$discount = new Discount_Model(Offer_Model::getInstance());

/* @var $discountPercentage object */
//$discountPercentage = $discount->calculateDiscount(new DiscountPercentage_Model());
?>
