<?php
class SAXApi
{
 
    private $stringchars;
    private $state=0;
    private $EOF=false;
    //states 1=Start 2=End 3=Text 4=Attribute
    private $cursor=0;
    private $element="";
    
    public function SAXApi()
    {}
    public function getstringchars()
    {
        return $this->stringchars;
    }
    public function setElement($value)
    {
        $this->element=$value;
    }
    public function getElement()
    {
        return $this->element;
    }
    public function clearElement()
    {
        $this->element="";
    }
    public function getEOF()
    {
        return $this->EOF;
    }
    public function setEOF($value)
    {
        $this->EOF=$value;
    }
    public function getState()
    {
        return $this->state;
    }
    public function setState($value)
    {
        $this->state=$value;
    }
    public function setstringchars($array)
    {
        $this->stringchars=$array;  
    }
    public function setCursor($position)
    {
        $this->cursor=$position;
     }
     public function getCursor()
     {
         return $this->cursor;
     }
     public function isEOF()
     {
         return $this->EOF;
     }
   
    public function LoadXML($xmlFile)
    {
        $myXmlFile = $xmlFile;
        $arrayChars=str_split(file_get_contents($myXmlFile)); 
        $this->setstringchars($arrayChars);
    }
    public function next()
    {
        $chars=$this->getstringchars();
        $charCount=sizeof($chars);
        $Cursorposition=$this->getCursor();
        if($Cursorposition<$charCount)
        {
            if($chars[$Cursorposition]=="<")
                {
                $this->setState(1);
                 $this->clearElement();
               print "<br/>";
               
                }
            else if($this->getState()==1&&$this->getState()!=2)
                {
                if($this->getState()!=4&&$chars[$Cursorposition]!=" ")
                {
                            if($chars[$Cursorposition]!="/")
                            {
                                 if($chars[$Cursorposition]!=">")
                                    {
                                   $this->element.=$chars[$Cursorposition];
                                   echo $chars[$Cursorposition]; 
                                    }
                                    else
                                    {
                                     $this->setState(3);
                                     $this->clearElement();
                                    }                        
                            }
                             else 
                            {                              
                                $this->setState(2);
                                 $this->clearElement();
                            }
                }
                else if(($chars[$Cursorposition]==" ")&&$chars[$Cursorposition+1]!="/")
                {
                   $this->setState(4);
                    $this->clearElement();
                }
                                                                          
                }
            else  if($this->getState()==3)
                    {
                $this->element.=$chars[$Cursorposition];
                      // echo $chars[$Cursorposition];
                    }
            else  if($this->getState()==4)
                    {
                        if($chars[$Cursorposition]!=">"&&$chars[$Cursorposition]!="/")
                            {
                            $this->element.=$chars[$Cursorposition];
                          //  echo $chars[$Cursorposition];
                            }
                    }
          $Cursorposition++;
          $this->setCursor($Cursorposition);
        }
        else
        {
            $this->setEOF(true);
        } 
        
    }

    
}
