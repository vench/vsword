<?php
/**
* Example 2 of adding their styles to the document handler.
*/

require_once '../vsword/VsWord.php'; 
VsWord::autoLoad();

class MyInitNode implements IInitNode {

	/**
	* @param string $tagName
	* @param mixed $attributes
	* @return Node
	*/
	function initNode($tagName, $attributes) {   
		if($tagName == 'p' && isset($attributes['class']) && $attributes['class'] == 'BigText') {
				$p = new PCompositeNode();
			    $r = new RCompositeNode();
			    $p->addNode($r); 
			    $r->addTextStyle(new BoldStyleNode());
			    $r->addTextStyle(new FontSizeStyleNode(36));  
			    return $p;
		}
		return NULL;
	}
}

$doc = new VsWord();  
$parser = new HtmlParser($doc);
$parser->addHandlerInitNode( new MyInitNode() );
 
$parser->parseFromUrl('docx1.html');
echo '<pre>'.($doc->getDocument()->getBody()->look()).'</pre>';
$doc->saveAs('htmlparser_yourstyle2.docx');