<?php
/**
* This example demonstrates the parsing HTML string and convert it into the document.
*/
require_once '../vsword/VsWord.php'; 
VsWord::autoLoad();

$doc = new VsWord();  
$parser = new HtmlParser($doc);
$parser->parse('<h1>Hello world!</h1>');
$parser->parse('<h3>Hello world!</h3>');
$parser->parse('<p>Hello world!</p>');
$parser->parse('<h2>Header table</h2><table><tr><td>Coll 1</td><td>Coll 2</td></tr></table>');
 

echo '<pre>'.($doc->getDocument()->getBody()->look()).'</pre>';

$doc->saveAs('htmlparser.docx');
