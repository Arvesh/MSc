<?php

    $config['MYSQL_SERVER'] = 'localhost';
    $config['MYSQL_USER'] = 'root';
    $config['MYSQL_PW'] = '';
    $config['MYSQL_DB'] = '_hotel';
    $config['MYSQL_PORT'] = '';
    $config['TODAY'] = date("Y/m/d");

    foreach($config as $key => $value)
        define ($key, $value);
    
    
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
      
        case 'Controller':
            $path = 'Controllers/';
            break;
        case 'View':
            $path = 'Views/';
            break;
        
        default:
            throw new ClassNotFoundException("The object's class/filename doesn't exist.");
            break;

      }

      require_once $path . $class . '.php';
}

function loadView($filename){
    
    require_once 'Views/'.$filename.'.php';
}

?>
