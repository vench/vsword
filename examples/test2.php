<?php

/*  
 */
require_once '../vsword/VsWord.php'; 
VsWord::autoLoad();

$htmlContent = '<p>Hello<br/>world!</p>';


$doc = new VsWord();
$parser = new HtmlParser($doc);
$parser->parse($htmlContent);

 
echo '<pre>'.($doc->getDocument()->getBody()->look()).'</pre>';

$doc->saveAs('./test2.docx');