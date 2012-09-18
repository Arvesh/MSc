<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Course
 *
 * @author sarju dooly <elo_kaveesh@hotmail.co.uk>
 */
class Course {
    //put your code here
    
    private $name;
    private $number;
    private $duration;
    private $fees;
    
    
    public function getname() {        return $this->name; }
    public function setname($name){$name = $this->name;}
    
    public function getnumber() {        return $this->number; }
    public function setnumber($number){$number = $this->number;}
    
    public function getduration() {        return $this->duration; }
    public function setduration($duration) {        $duration = $this->duration;}
    
    public function getfees() {        return $this->fees; }
    public function setfees($fees) {        $fees = $this->fees;}
    
}

?>
