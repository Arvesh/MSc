<?php
require_once 'config.php';
/**
 *  Base_Controller Class
 *
 * @author Gulshan Bhaugeerothee <arvesh9@gmail.com>
 */
class Base_Controller {
    
  private static $instances;
  protected $methodExist=true;
  
  public function __construct() {
      $c = get_class($this);

      if(isset(self::$instances[$c])) {
          throw new Exception('You can not create more than one copy of a singleton.');
      } else {
          self::$instances[$c] = $this;
      }
  }

  final public static function getInstance() {
      $c = get_called_class();
      if (!isset(self::$instances[$c])) {
          $args = func_get_args();
          $reflection_object = new ReflectionClass($c);
          self::$instances[$c] = $reflection_object->newInstanceArgs($args);
      }
    return self::$instances[$c];
  }

  final public function __call($name, $arguments='') {

    if(!method_exists(get_class($this), $name)){

      loadView('404');
      
    }


  }

  final public function __clone() {
      throw new Exception('You can not clone a singleton.');
  }
}
