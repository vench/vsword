<?php

/* 
 * Example text alignment.
 */

require_once '../vsword/VsWord.php'; 
VsWord::autoLoad();

$doc = new VsWord();   

$myString = "<p>The car is <i>red</i></p>";
$parser = new HtmlParser($doc);  
$parser->parse($myString); 

 
/**/
echo '<pre>'.($doc->getDocument()->getBody()->look()).'</pre>';

$doc->saveAs('space.docx');
