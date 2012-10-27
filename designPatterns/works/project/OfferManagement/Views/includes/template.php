<?php 

if(!empty($_SESSION['filename'])){
  
  $maincontent = $_SESSION['filename'];
  
  unset($_SESSION['filename']);
  
}else{
  $maincontent = '404';
}
require_once 'header.php';?>

<?php require_once 'Views/'.$maincontent.'.php';?>

<?php require_once 'footer.php';?>

