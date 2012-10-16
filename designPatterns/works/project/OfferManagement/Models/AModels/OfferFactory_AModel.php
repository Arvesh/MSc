<?php
require_once 'config.php';
/**
 * Description of OfferFactory_AModel
 *
 * @author Gulshan Bhaugeerothee
 */
abstract class OfferFactory_AModel extends Database_Model {
    
   
        
//    protected $getConnection = Database_Model::getInstance();
        
   public function getConnection(){
       
       return Database_Model::getInstance();
       
   }
   
   public function closeConnection(){
       
       return Database_Model::getInstance()->close();
   }
    
    public abstract function createHoneymoonersOffer();
    
    public abstract function createEarlyBookingOffer();
    
    public abstract function createLateBookingOffer();
}