<?php

/* 
 * Example symbol &.
 */

require_once '../vsword/VsWord.php'; 
VsWord::autoLoad();

$doc = new VsWord();   

$myString = "<p>Example symbol &</p>"
        . "<p>Struggling to find a way to use a & symbol in the HTML. I've tried both &amp; and &. Is there any workaround for this? I've tried using the HTML parser as per the example.</p>";
$parser = new HtmlParser($doc);  
$parser->parse($myString); 

 
/**/
echo '<pre>'.($doc->getDocument()->getBody()->look()).'</pre>';

$doc->saveAs('symbol&.docx');
