<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class loop extends REST_Controller {

  function value_get() {
    $toReturn = '';
    if (!$this->get('number')) {
      $this->response(NULL, 400);
    }
    for ($i = 0; $i <= $this->get('number'); $i++)
      $toReturn .= '+-';
    
    $this->response($toReturn,200);
  }

}
