<?php
/**
* Class HtmlParser
*
*  @version 1.0.2
*  @author v.raskin
 * @package vsword.parser
*/
class HtmlParser extends Parser {
	
	/**
	* @var VsWord
	*/
	protected $word;
	
	protected $currentHTMLNode;

	/**
	* @param VsWord $word
	*/
	public function __construct(VsWord $word) {
		$this->word = $word;
		$this->addHandlerInitNode(new DefaultInitNode( $this->word ));
	}
	
	/**
	* @param string $html
	*/
	public function parse($html) {
		$html = $this->stripString($html); 
		$loader = new HTMLLoader();
		$dom = $loader->parse($html);  
		//echo '<pre>'.$dom->look().'</pre>';
		$body = $this->word->getDocument()->getBody();
		$this->translate($dom, $body);
	}
	
	protected function translate($ntmlNode, $wordNode) {
		$this->currentHTMLNode = $ntmlNode;
		if($ntmlNode instanceof StringNode) {
			$this->addText($ntmlNode->getText(), $wordNode);
			return;
		}
		$node = $this->initNode($ntmlNode->getName(), $ntmlNode->getAttributes()); 
		$addeded = NodeAddeded::init($node, $wordNode, $this);
		
		if($ntmlNode instanceof CompositeNode) {
			foreach($ntmlNode->getChildrens() as $nNode) {
				$this->translate($nNode, $addeded->getNewNode());
			}
		}
	}
	
	
	
	public function getCurrentHTMLNode() {
		return $this->currentHTMLNode;
	}
	
	/**
	* @return boolean
	*/
	public function noEmptyText($text) {
		return trim($text) != '';
	}
	
	/**
	* 
	*/
	public function parseFromUrl($url) {
		$content = file_get_contents($url);
		$content = preg_replace('/<!--(.*?)-->/is', '',$content );  
		$content = preg_replace('/<script.*?>(.*?)<\/script>/is', '',$content );
		$content = preg_replace('/<style.*?>(.*?)<\/style>/is', '',$content );
		preg_match('/<body.*?>(.*?)<\/body>/is', $content, $match);  
 		$html = $match[1];
 		$this->parse($html);
	}
	
	/**
	* @return string
	*/
	protected function stripString($html) {
		str_replace(array('&nbsp;', '&quot;', '&laquo;', '&copy;', '&raquo;'), array(' ', "'", '"', '©', '"'), $html);
		return  preg_replace('/\&[a-zA-Z0-9]{1,}\;/is', '', $html);  
	}

	
	/**
	* @param string $text
	* @param Node $node
	* @return boolean
	*/
	protected function addText($text, $node) { 
		do {
			if($node instanceof INodeTextAdded) {
				$nText = ($node->addText($text));   
				if($nText instanceof RCompositeNode ) {
					$nText->getParent()->clearTextStyle();
				}
				return $nText;
			}
		} while(!is_null($node = $node->getParent()));
		return false;
	}
	 
}