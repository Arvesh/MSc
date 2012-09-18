<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of student
 *
 * @author sarju dooly <elo_kaveesh@hotmail.co.uk>
 */
class student {
    //put your code here

   public static $instance;
   
   
    private function __construct() {
       
    }
    
//    $stud  = new student();
    
   public static function getinstance()
   {
       // create object / return if object does not exist
       
     if(self::$instance == NULL){
         echo "test";
         self::$instance = new student();
         
     }
     else
     {
         echo "already tested";
         return self::$instance;
         
     }
   }
   


}

?>
