<?php
/**
* Example translates a nested list of HTML in docx
*/

require_once '../vsword/VsWord.php'; 
VsWord::autoLoad();

$doc = new VsWord();  
$parser = new HtmlParser($doc);  

$html = '<ul>
	    <li>Level Node 1</li>
	    <li>Level Node 2</li>
	    <li>Level Node 3 
		<ul>
		    <li>Level Node 2</li>
		    <li>Level Node 2</li>
		    <li>Level Node 2
			<ul>
			    <li>Level Node 3</li>
			    <li>Level Node 3</li>
			    <li>Level Node 3
				<ul>
				    <li>Level Node 4</li>
				</ul></li>
			</ul>
		    </li>
		    <li>Level Node 2</li>
	</ul></li>
	<li>Level Node 1</li>
	<li>Level Node 1</li>
	<li>Level Node 1</li></ul>
';

$parser->parse($html); 
echo '<pre>'.($doc->getDocument()->getBody()->look()).'</pre>'; 
$doc->saveAs('tree.docx');