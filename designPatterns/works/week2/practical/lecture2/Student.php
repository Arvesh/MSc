<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student
 *
 * @author sarju dooly <elokaveesh@hotmail.co.uk>
 */
class StudentLoan {
    //put your code here
   private $name;
   private $dob;
   private $address;
   private $id;
   
   public function getname(){return $this->name;}
   
   public function setname($name){ $this->name = $name;}
   
   public function getdob(){return $this->dob;}
   
   public function setdob($dob){$this->dob = $dob; }
   
   public function getaddress(){return $this->address;}
   
   public function setaddress($address){$this->address = $address;}
   
   public function getid(){return $this->id;}
   
   public function setid($id){$this->id = $id;}
   
   
   /**
    * 
    */
   public function enroll()
   {
       // insert students into database
   }

   
      public function drop($id)
   {
       // flag(drop) a student by using its id
   }
   
      public function attend()
   {
       
   }
   
      public function finish()
   {
       
   }
   
   
   
}

?>
