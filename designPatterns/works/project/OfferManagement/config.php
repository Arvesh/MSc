<?php

function __autoload($class) {


  /* @var $seperate array */
  /* @var $class string */
  $seperate = explode('_', $class);


  /* @var $classType string */
  $classType = $seperate[1];

  switch ($classType) {
      
    case 'Model':
        $path = 'Models/';
      break;

    case 'IModel':
        $path = 'Models/IModels/';
      break;

    case 'Repository':
        $path = 'Repositories/';
      break;
  
    case 'AModel':
        $path = 'Models/AModels/';
      break;
  
    default:break;

  }

  require_once $path . $class . '.php';
}

?>
