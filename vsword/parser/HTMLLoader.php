<?php

 

/**
 * Class HTMLLoader
 *
 * @version 1.0.2
 * @author v.raskin
 * @package vsword.parser
 */
class HTMLLoader {

	protected $validateAttribute = FALSE;
	
	
    
    /**
	* @return boolean
	*/
	public function noEmptyText($text) {
		return trim($text) != '';
	}
	
 
	

	
	public function parseFromUrl($url) {
		$content = file_get_contents($url);  
		$content = preg_replace('/<!--(.*?)-->/is', '',$content );  
		$content = preg_replace('/<script.*?>(.*?)<\/script>/is', '',$content );
		$content = preg_replace('/<style.*?>(.*?)<\/style>/is', '',$content );
		preg_match('/<html.*?>(.*?)<\/html>/is', $content, $match);  
 		$html = (isset($match[1])) ? $match[1] : $content; 
 		return $this->parse($html);
	}
    
    /**
     * 
     */
    public function parse($html) {
		$html = htmlspecialchars_decode($html, ENT_QUOTES);
		$i = 0;
		$length = strlen($html);
		$target = new ArbitraryCompositeNode('document');
		$open = false;
		$end = false;
		$content = '';
		$eatAttr = false;
		$stringTag = '';
		$attributeStr = '';
		    
		while($length > $i) {
		    $char = substr($html, $i ++, 1);
		    if($char == '<') { 
				if($this->noEmptyText($content)) { 
					$target->addNode(new StringNode($content));
				}
				$content = '';
				$open = true;
				$end = false;
				if(substr($html, $i, 1) == '/') { 
				    $end = true;
				    $i ++;
				}
		    } else if($open  && $char == '>') {
				 
				if($end ) { //close tag 
					if($this->noEmptyText($content)) {
						$target->addNode(new StringNode($content));
					}
				    $content = '';
				    if(!is_null($target->getParent())) {
						$target = $target->getParent();
				    }
				} else { 
					if($this->isSingleNode($stringTag)) {
						$node = new ArbitraryNode($stringTag, $this->attributeStrToArray($attributeStr));
						$target->addNode($node);
					} else {
						$node = new ArbitraryCompositeNode($stringTag, $this->attributeStrToArray($attributeStr));
						$target->addNode($node);
				   		$target = $node;
					} 
				     
				}
				
				$open = false;
				$end = false;		 
				$stringTag = '';
				$eatAttr = false; 
				$attributeStr = '';
			
		    }  else if($open && !$eatAttr && preg_match('/[a-zA-Z0-9]/', $char)) {
				$stringTag .= $char;
		    }  else if($open) {
				$eatAttr = true;
				$attributeStr .= $char;
		    } else if(!$open) {
				$content .= $char; 
		    }
		}
		if($this->noEmptyText($content)) {
			$target->addNode(new StringNode($content));
		}
			
		return $this->lastResult = $target;
		    
    }
	
	/**
	* @return boolean
	*/
	public function isSingleNode($stringTag) {
		return in_array(strtolower($stringTag), array('br', 'hr', 'meta', 'link', 'input', 'img',));
	}
    
    /**
	* @param string $attributeStr
	* @return array
	*/
	protected function attributeStrToArray($attributeStr) { 
		$attr = array();
		$attributeStr = trim($attributeStr);
		$l = strlen($attributeStr);
		$key = '';
		$value = '';
		$state = 0;
		for($i = 0;  $i < $l; $i ++) {
			$char = substr($attributeStr, $i, 1);
			if($state == 0 && $char == '=') {
				$state = 1;
			} else if($state == 1 && $char == '"') {
				$state = 2;
			} else if($state == 1 && $char == '\'') {
				$state = 3;
			} else if(($state == 3 && $char == '\'') || ($state == 2 && $char == '"')) {
				$attr[trim($key)] = $value; 
				$key = '';
				$value = '';
				$state = 0;
			} else if($state == 2 || $state == 3) {
				$value .= $char;
			} else if($state == 0) {
				$key .= $char;
			} 
		}
		if($state != 0 && $this->validateAttribute) {
			throw new Exception('Attribute syntax error');
		}  
		return $attr;
	}
	
 
}
