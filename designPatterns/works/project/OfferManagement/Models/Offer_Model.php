<?php
require_once 'config.php';
/**
 * Description of Offer Model extending its factory ,
 * itself extending the MySQL abstract class
 *
 * @author Gulshan Bhaugeerothee
 */
class Offer_Model extends OfferFactory_AModel{
    
    private static $instance;
    private $strategyObject;
    protected $table_name = 'offer';

    /*SINGLETON*/
    public static function getInstance(){
        
        if (self::$instance == null){
            
            self::$instance = new Offer_Model();            
        }
        
        return self::$instance;
    }
    
    /*GENERIC SETTER*/
    public function __set($name, $value) {
        
        throw ErrorException("NOT IMPLEMENTED");
    }
    
    /*GENERIC GETTER*/
    public function __get($name) {
        
        throw ErrorException("NOT IMPLEMENTED");
    }
        
    /*CREATING AN EARLY BOOKING OFFER*/
    public  function  createEarlyBookingOffer() {
        
        return $this->createBookingOffer(new EarlyBooking_Model());
        
    }    
   
    /*CREATING A HONEYMOONER OFFER*/
    public function createHoneymoonersOffer() {
        
        return $this->createBookingOffer(new Honeymooners_Model());
    }
    
    /*CREATING A LATE BOOKING OFFER*/
    public function createLateBookingOffer() {
        
        return $this->createBookingOffer( new LateBooking_Model());
    }
    
    /*
     * Generic class to create offer
     * @param $type -> type of offer to be created
     * 
     * FIELDS:
     *  offer_id xxxxxxx
     *  offer_Name
     *  valid_From
     *  valid_To
     *  date_Created
     *  combinable
     *  description
     *  minimum_Stay
     *  offer_Type_ID ----- FOREIGN KEY
     */
    public function createBookingOffer(IOfferCreator_IModel $type){
        
        $this->getConnection();
        
        $this->setTable('offer_type');
        
        $fldarray['offer_Type_ID'] =  $this->resultToArray(
                                                    $this->selectRecord(
                                                            array('offer_type'=>$type->getType()),
                                                            '*')
                                        );
        
        $this->setTable($this->table_name);
        
        $fldarray['offer_Type_ID'] = $fldarray['offer_Type_ID'][0]['id'];
        
        $fldarray['offer_Name'] = 'testOffer';
        
        $fldarray['valid_From'] = TODAY;
        
        $fldarray['valid_To'] = date("Y/m/d",  strtotime("2012/10/11"));
        
        $fldarray['date_Created'] = TODAY;
        
        $fldarray['combinable'] = 0;
        
        $fldarray['description'] = 'some sample descriptions';
        
        $fldarray['minimum_Stay'] = '2';
        
        $this->insertRecord($fldarray);
        
        return $this->affectedRows();
        
    }
    
    
    public function getOffer($id='',$type=''){
        
        $toReturn = '';
        
        $this->getConnection();
        
        if($id=='' && $type==''){
            
            $toReturn = $this->resultToArray($this->selectAll());
        }
        
    }
    
    /*OPTIONAL TO REVIEW WHEN NECESSARY*/
    public function calculateOffer(IOfferCreator_IModel $offerCalculator){
        
        return $offerCalculator->calculate();
    }
    
    
   
}