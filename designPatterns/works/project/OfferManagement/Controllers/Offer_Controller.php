<?php
/**
 * Description of Offer_Controller
 *
 * @author sarju dooly <elo_kaveesh@hotmail.co.uk>
 */
class Offer_Controller extends Base_Controller{
    
    public function __construct() {
      
        
      
    }
    
    public function getValues($param=''){
     
      echo $param.'inside getvalues';
      
    }
    
    public function add(){
      
    }
    
    public function edit($id){
      
    }
    
    public function update(){
        
        $data['rooms']= Room_Model::getInstance()->getAllRooms();
       
      loadView('updateoffer',$data);
      
    }
    
    public function save(){
        
        /*
         * $fldarray['offer_Type_ID'] = $fldarray['offer_Type_ID'][0]['id'];
        
        $fldarray['offer_Name'] = 'testOffer';
        
        $fldarray['valid_From'] = TODAY;
        
        $fldarray['valid_To'] = date("Y/m/d",  strtotime("2012/10/11"));
        
        $fldarray['date_Created'] = TODAY;
        
        $fldarray['combinable'] = 0;
        
        $fldarray['description'] = 'some sample descriptions';
        
        $fldarray['minimum_Stay'] = '2';
         */
        
        $offer = Offer_Model::getInstance();
        
        $offer->offer_Name = 'newOffer';
        $offer->valid_From = TODAY;
        $offer->valid_To = date("Y/m/d",  strtotime("2012/12/12"));
        $offer->date_Created = TODAY;
        $offer->combinable=1;
        $offer->description = 'a little description about the offer';
        $offer->minimum_Stay = '4';
        
//        $offer->data = $_POST;
        
        $toReturn = $offer->createBookingOffer(new Honeymooners_Model());
        $toReturn = $offer->updateBookingOffer(new Honeymooners_Model());
        
       return $toReturn;
        
    }
    
}