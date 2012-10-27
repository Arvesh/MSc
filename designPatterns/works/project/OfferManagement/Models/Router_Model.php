<?php
/**
 * @author Gulshan Bhaugeerothee 
 * @example 
 * 
 * in index.php file : 
 * 
 * require 'Router.php';
 * 
 * $router = Router::parse();
 * 
 * 	// there are 3 params from the url $router->controller, $router->action, $router->params
 * 
 * // if url is http://www.google.com/java/add/1
 * 
 * // Params : 
 * // 		'$router->controller' ==> java
 * //		'$router->action' ==> add
 * //		'$router->params' ==> 1
 * 
 * //This means go on controller java , find the method add , and pass in the parameter 1
 * 
 * //Below Sample code based on a simple switch case.
 * 
 * switch($router->controller){
 * 
 * 	case 'profile':
 * 
 * 			switch($router->action){
 * 				
 * 				case 'create':
 * 
 * 						$profile->create($router->params);
 * 
 * 						require_once 'default_view.php';
 * 
 * 					break;
 * 			
 * 				case 'edit':
 * 
 * 						$profile->edit($router->params);
 * 					
 * 						require_once 'edit_profile.php';
 * 
 * 					break;
 * 
 * 				default:
 * 					break;
 * 
 * 			}
 * 		break;
 * 
 * 
 * 	default:
 * 		break;
 * 
 * 
 * }
 * 
 * 
 * 
 * 
 * @package MITD jobspace - Diploma Final Year project 2009
 */
class Router_Model{
	
	/*CONTANTS ARE DEFINED HERE FOR THE ROUTER CLASS*/

	const root = 'OfferManagement';
	const admin_route = '';
	const default_controller = 'index';
	const default_action = 'index';
	const default_param_value = '';
	
	/*SET TO TRUE ONLY IF APPLICATION REQUIRE MULTIPLE PARAMS AND CODE BELOW HAS TO BE UNCOMMENTED*/
	const multiple_default_params = false;

	public static function parse($uri=null){
		if($uri===null){
			$uri = $_SERVER['REQUEST_URI'];
		}
        
		$uri= trim($uri,'/');
        
		$root = trim(self::root,'/');
		
        
		if(strpos($uri . '/',$root . '/') === 0 ) $uri = substr($uri, strlen($root)+1);
		
		$parts = explode('/',$uri);
		
		$offset = 0;
		
		$route = new stdClass;
		
		$route->admin = false;
		
		if(strtolower($parts[0])== self::admin_route){
			$route->admin = true;
			$offset = 1;
		}
		$route->controller = empty($parts[$offset])? self::default_controller : strtolower($parts[$offset]);
		$route->action = empty($parts[$offset+1])? self::default_action : strtolower($parts[$offset+1]);
		
       
        
		$params = new stdClass;		
		
		$c = count($parts);
        
        
        
        
        
        $rootArrayKey =array_search($root, $parts);
        
        $route->controller = empty($parts[$rootArrayKey+1])?null:$parts[$rootArrayKey+1];
        $route->action = empty($parts[$rootArrayKey+2])?null:$parts[$rootArrayKey+2];
        
        
		for($i= $offset+2; $i<$c; $i+=2){
		
			while(empty($parts[$i]) &&$i< $c)$i++;
			
			if($i==$c) break;
			
			$key = strtolower($parts[$i]);
			


			/* while(!self::multiple_default_params && empty($parts[$i+1]) && $i <$c) $i++;
			$value = empty($parts[$i+1]) ? self::default_param_value : $parts[$i+1];
			$params->{$key} = $value; */


			
			$params = $key;
		}
		$route->params = $params;
        $route->params = empty($parts[$rootArrayKey+3])?null:$parts[$rootArrayKey+3];
		return $route;
	}
}
?>