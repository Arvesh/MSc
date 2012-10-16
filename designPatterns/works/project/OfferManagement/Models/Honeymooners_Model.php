<?php
require_once 'config.php';
/**
 * Description of Honeymooners_Model
 *
 * @author Gulshan Bhaugeerothee
 */
class Honeymooners_Model extends AHoneymooners_AModel implements IOfferCreator_IModel{
    
    private $type = 'honeymooner';
    
    public function __construct() {
        
        echo "Honeymooners ==> constructor";
    }
    
    public function processHoneyMoonersOffer() {
        
    }

    

    public function calculate() {
        echo "honeymooners was calculated";
    }

    public function getType() {
        
        return $this->type;
    }
    
}