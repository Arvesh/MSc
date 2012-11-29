<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
     include 'SAX2.php';
     $api=new SAX2();
     $api->LoadXML("xmlfile.xml");
     $i=0;
    while(!$api->isEOF())
    {
//         if($api->getElement()=="author")
//    {
//      echo  "true";
//    }
        $api->next();

    }
    $arr=$api->getElementAttributeArray();
    foreach($arr as $elem)
    {echo $elem."<br/>";}
    
     $arr2=$api->getElementArray();
    foreach($arr2 as $elem)
    {echo $elem."<br/>";}
    
   
        ?>
    </body>
</html>
