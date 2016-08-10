<?php
/**
* Example of adding their styles to the document handler.
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
		if($tagName == 'b' && isset($attributes['style'])) {
 			$style = $this->parseStyle($attributes['style']);
			$fontSize = isset($style['font-size']) ? intval($style['font-size']) : 11;
 			 	
			$p = new PCompositeNode();
			$r = new RCompositeNode();
			$p->addNode($r); 
			$r->addTextStyle(new BoldStyleNode());
			$r->addTextStyle(new FontSizeStyleNode(   $fontSize ));  
			return $p;
		}
		if($tagName == 'span' && isset($attributes['style'])) {
 			$style = $this->parseStyle($attributes['style']);
			$fontSize = isset($style['font-size']) ? intval($style['font-size']) : 11;
 			 	
			$p = new PCompositeNode();
			$r = new RCompositeNode();
			$p->addNode($r);  
			$r->addTextStyle(new FontSizeStyleNode(   $fontSize ));  
			return $p;
		}
		return NULL;
	}

	private function parseStyle($strCss) {
		$styles = [];
		$pairs = explode(';', $strCss);	
		foreach($pairs as $pair) {
			if(strpos($pair, ':') !== false) {
				list($name, $value) = explode(':', $pair);
				$styles[trim($name)] = trim($value);
			}
		}	
		return $styles;
	}
}

$doc = new VsWord();  
$parser = new HtmlParser($doc);
$parser->addHandlerInitNode( new MyInitNode() );

$parser->parse('<b style="font-size: 12px;">Fruit:</b><span style="font-size: 16px;"> Orange</span>');

echo '<pre>'.($doc->getDocument()->getBody()->look()).'</pre>';

$doc->saveAs('htmlparser_yourstyle3.docx');
