<?php

/**
 *
 * @author sarju dooly <elo_kaveesh@hotmail.co.uk>
 */
interface IDiscount_IModel {
   
    public function calculate(ArrayObject $array,$type=null);
    
    public function calcPercentage(ArrayObject $array);
    
    public function calcAmount(ArrayObject $array);
    
    public function calcNight(ArrayObject $array);
    
}
