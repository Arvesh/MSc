<?php
/**
 * Description of Offer_Controller
 *
 * @author sarju dooly <elo_kaveesh@hotmail.co.uk>
 */
class Offer_Controller extends Base_Controller{
    
    public function __construct() {
      
        loadView('home');
      
    }
    
    public function getValues($param=''){
     
      echo $param.'inside getvalues';
      
    }
    
    public function add(){
      
    }
    
    public function edit($id){
      
    }
    
    public function create(){
      loadView('createoffer');
    }
    
}