<?php
/**
* Class HtmlParser
*
*  @version 1.0.1
*  @author v.raskin
*/
class HtmlParser extends Parser {
	
	/**
	* @var VsWord
	*/
	protected $word;
	

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
		$target = $root = $this->word->getDocument()->getBody();
		$i = 0;
		$length = strlen($html);
		$open = false;
		$end = false;
		$stringTag = '';
		$content = ''; 
		$attributeStr = '';
		$eatAttr = FALSE;
		
		//$treeLevel = 0;
		
		while($length > $i) {
		    $char = substr($html, $i ++, 1);
		
		    if($char == '<') { 
				if($this->noEmptyText($content)) {  
					if(!($target = $this->addText($content, $target))) {
						$target = $this->initNode('p');
						$root->addNode($target);
						$p = $target->addText($content);
						
						if(!($target instanceof CompositeNode)) {
								$target = $target->getParent();
						 }  
					}
					if($target instanceof PCompositeNode) {
					    $target->clearTextStyle();
					} 
					$content = ''; 
				}
			
				$open = true;
				$end = FALSE;
				if(substr($html, $i, 1) == '/') { 
				    $end = true;
					$i ++;
				}   
		    } else if($open  && $char == '>') { 
				
				if($end ) { //close tag 
				  
					if($this->noEmptyText($content)) {
						if(!($target = addText($content, $target))) {
							$target = $this->initNode('p');
							$root->addNode($target);
							$target = $target->addText($content); 
							if(!($target instanceof CompositeNode)) {
									$target = $target->getParent();
						    } 
						}
					} 
				    
				    $target =  !is_null($target) ? $target->getParent() : null;			
					if(is_null($target)) {
						$target = $root; 
					}
					$content = '';
				} else {
					if(is_null($target)) {
						$target = $root;
					}
				   // $oldNode = 	$node;
				    $node = $this->initNode($stringTag, $attributeStr); 
				    $addeded = NodeAddeded::init($node, $target, $this);
				    $node = $addeded->getNewNode();
				    $target = $addeded->getNewTarget();
				    if($node instanceof CompositeNode) {
							$target = $node;
				    }
				    
				   // if($node instanceof ListCompositeNode) {
					//if($oldNode instanceof ListItemCompositeNode) $treeLevel ++;
					//$node->setLevel($treeLevel);
				    //} 
				}
				$open = false;
				$end = false;		 
				$stringTag = '';
				$eatAttr = false; 
				$attributeStr = '';
		    } else if($open && !$eatAttr && preg_match('/[a-zA-Z0-9]/', $char)) {
				$stringTag .= $char;
		    }  else if($open) {
				$eatAttr = TRUE;
				$attributeStr .= $char;
			} else if(!$open) {
				$content .= $char; 
		    }
		}
		
		if($this->noEmptyText($content)) {
			$this->addText($content, $target);
		}
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
		$content = preg_replace('/<script.*?>(.*?)<\/script>/is', '',$content );
		preg_match('/<body.*?>(.*?)<\/body>/is', $content, $match);  
 		$html = $match[1];
 		$this->parse($html);
	}
	
	/**
	* @return string
	*/
	protected function stripString($html) {
		return str_replace(array('&nbsp;', '&quot;', '&laquo;', '&copy;', '&raquo;'), array(' ', "'", '"', 'C', '"'), $html);
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