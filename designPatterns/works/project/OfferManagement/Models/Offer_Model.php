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
    
    /*
     * Generic class to create offer
     * @param $type -> type of offer to be created
     * 
     * KEYS:
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
    private $data = array();

    /*SINGLETON*/
    public static function getInstance(){
        
        if (self::$instance == null){
            
            self::$instance = new Offer_Model();            
        }
        
        return self::$instance;
    }
    
    /*GENERIC SETTER*/
    public function __set($name, $value)
    {
        echo "Setting '$name' to '$value'\n";
        $this->data[$name] = $value;
    }
    
    /*GENERIC GETTER*/
    public function __get($name)
    {
        $toReturn = null;
        echo "Getting '$name'\n";
        
        if (array_key_exists($name, $this->data)) {
            
           $toReturn = $this->data[$name];
        }

       
        return $toReturn;
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
    
    
    public  function  updateEarlyBookingOffer() {
        
        return $this->updateBookingOffer(new EarlyBooking_Model());
        
    }    
   
    /*CREATING A HONEYMOONER OFFER*/
    public function updateHoneymoonersOffer() {
        
        return $this->updateBookingOffer(new Honeymooners_Model());
    }
    
    /*CREATING A LATE BOOKING OFFER*/
    public function updateLateBookingOffer() {
        
        return $this->updateBookingOffer( new LateBooking_Model());
    }
    
    public function updateBookingOffer(IOfferCreator_IModel $type){
        
        $this->getConnection();
        
        $this->setTable('offer_type');
        
        $fldarray['offer_Type_ID'] =  $this->resultToArray(
                                                    $this->selectRecord(
                                                            array('offer_type'=>$type->getType()),
                                                            '*')
                                        );
        $this->offer_Type_ID = $fldarray['offer_Type_ID'][0]['id'];
        
        $this->setTable($this->table_name);
        
        $where = array('offer_id'=>$this->data['offer_id']);
        unset($this->data['offer_id']);
        
        $this->updateRecord($where,$this->data);
        
        return $this->affectedRows();
    }
    
    
    public function createBookingOffer(IOfferCreator_IModel $type){
        
        $this->getConnection();
        
        $this->setTable('offer_type');
        
        $fldarray['offer_Type_ID'] =  $this->resultToArray(
                                                    $this->selectRecord(
                                                            array('offer_type'=>$type->getType()),
                                                            '*')
                                        );
        $this->offer_Type_ID = $fldarray['offer_Type_ID'][0]['id'];
        
        $this->setTable($this->table_name);
        
        $this->insertRecord($this->data);
        
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