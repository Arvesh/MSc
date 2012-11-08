<?php

/**
 * Description of MyParser
 *
 * @author gulshan bhaugeerothee
 */
class Tokeniser {
    
    
    private static $ATTR;
    private static $STARTDOC;
    private static $ENDDOC;
    private static $CURSOR=0;
    private static $BUFFER;
    private static $BUFFERCOUNT;
   
    public function __construct() {
        
        $data['START'] = 1;
        $data['END'] = 2;
        $data['TEXT'] = 3;
        $data['XMLDECL'] = '<?xml version="1.0" encoding="UTF-8"?>';
        
        foreach($data AS $key=>$value)
            define ($key, $value);
    }

    public function __get($name) {
        
    }
    
    public function __set($name, $value) {
        
    }
    
    
    
    
    public function fetch($xmlFile){
        
        $strFile = file_get_contents($xmlFile);
        print_r($strFile);
        self::$BUFFER=str_split(trim(trim(utf8_encode('<Person><name>John</name></Person>'))));
        print_r(self::$BUFFER);
        self::$BUFFERCOUNT = count(self::$BUFFER);
        $this->nextStep();
    }
    
    private function match($expression,$validationType){
        
    }
    
    private function nextStep(){
        
        while(self::$CURSOR < self::$BUFFERCOUNT){
                        
            if (self::$BUFFER[self::$CURSOR]==='<') {
                $charac = 'bracket';
                self::$CURSOR++;
                
                if(self::$BUFFER[self::$CURSOR] === '/'){
                    
                    $charac = 'slash';
                    
                    echo 'checking : '.$charac.' END <br />';
                }
                
                echo 'checking : '.$charac.' START <br />';
                
            }else{
               
                
                self::$CURSOR++;
                
            }
        }
    }
    
    private function getPosition(){
        
    }
    
    
    
    
}
