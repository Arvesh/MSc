<?php

require_once 'config.php';

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
 * (a). Offer ==> Factory pattern + Strategy + Singleton ( ALREADY IMPLEMENTED )
 * (b). Discount ==> Factory pattern + Strategy + Singleton
 * (c). Condition ==> Adapter Pattern
 * (d). Market ==> ?? -> still has to think abt it.
 * 
 * 
 * 
 */



/* @var $discount object */
/*$discount = Discount_Model::getInstance();

echo $discount->calculate(new ArrayObject, 'amounT');*/


/*=========TESTING OF FACTORY + SINGLETON + STRATEGY==========*/

Offer_Model::getInstance()->calculateOffer(Offer_Model::getInstance()->createEarlyBookingOffer());


?>
