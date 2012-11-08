<?php

require_once 'MyParser.php';

$parser = new Tokeniser();

echo '<pre>';
print_r($parser->fetch('test.xml'));
echo '</pre>';



?>