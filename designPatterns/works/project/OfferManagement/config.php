<?php
session_start();

    $config['MYSQL_SERVER'] = 'localhost';
    $config['MYSQL_USER'] = 'root';
    $config['MYSQL_PW'] = 'sniper';
    $config['MYSQL_DB'] = 'designpatterns_hotel';
    $config['MYSQL_PORT'] = '';
    $config['TODAY'] = date("Y/m/d");
    $config['PROJECT_FOLDER'] = 'OfferManagement';
    
    
    $absolute_url = explode($config['PROJECT_FOLDER'], $_SERVER['REQUEST_URI']);
    $config['ABSOLUTE_URL'] = 'http://'.$_SERVER['HTTP_HOST'].$absolute_url[0].$config['PROJECT_FOLDER'].'/';
    
     

    foreach($config as $key => $value)
        define ($key, $value);



function __autoload($class) {
    
      /* @var $seperate array */
      /* @var $class string */
      $seperate = explode('_', $class);


      /* @var $classType string */
      $classType =  array_key_exists(1, $seperate)? $seperate[1]:'404';

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
            $path='Views/';
            $class = '404';
            break;

      }
      
      file_exists($path . $class . '.php') ? require_once $path . $class . '.php': loadView('404');
      
}

function loadView($filename,$modal=false){
  
    if($modal==true){
      
      require_once 'Views/'.$filename.'.php';
    }else{
      $_SESSION['filename'] = $filename;
      require_once 'Views/includes/template.php';
    }
    
}

?>
