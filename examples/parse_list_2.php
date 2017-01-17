<?php
/**
* Example translates a nested list of HTML in docx
*/

require_once '../vsword/VsWord.php'; 
VsWord::autoLoad();

$doc = new VsWord();  
$parser = new HtmlParser($doc);  

$html = '<ul>
	<li>
	<p>Text</p>

	<ul>
		<li>List item 1</li>
		<li>List item 2</li>
	</ul>
	</li>
</ul>
<ul>
        <li>
            <p>Head</p></li>
	<li> 
            <p>Some more text</p>
	<ul>
		<li>List item 1</li>
		<li>List item 2</li>
                <li>List item 3</li>
	</ul>
	</li>
        <li>
        <p>Tail 1</p>
        <p>Tail 2</p>
        <p>Tail 3</p>
        </li>
</ul>
';

$parser->parse($html); 
echo '<pre>'.($doc->getDocument()->getBody()->look()).'</pre>'; 
$doc->saveAs('tree2.docx');