<?php
require_once 'config.php';

/**
 * Description of Room_Model
 *
 * @author sarju dooly <elo_kaveesh@hotmail.co.uk>
 */
class Room_Model extends Database_Model{
                protected $table_name = 'room';
                 private static $instance;

    public function  getAllRooms(){
        return $this->resultToArray($this->selectAll()) ;
    }
    
     public static function getInstance(){
        
        if (self::$instance == null){
            
            self::$instance = new Room_Model();            
        }
        
        return self::$instance;
    }
    
}