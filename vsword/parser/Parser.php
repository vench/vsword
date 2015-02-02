<?php



/**
*  Class Parser
* 
*  @version 1.0.0
*  @author v.raskin
 * @package vsword.parser
*/
abstract class Parser {
	/**
	* @var IInitNode[]
	*/
	protected $handlersInitNode = array();	
	
	/**
	* Add a handler to the top of the list.
	* @param IInitNode $handler
	*/
	public function addHandlerInitNode(IInitNode $handler) { 
		array_unshift($this->handlersInitNode, $handler);
	}
	
	/**
	* @param string $tagName
	* @param string $attributes
	* @return Node
	*/
	public function initNode($tagName, $attributes = NULL) {
		if(sizeof($this->handlersInitNode)) {  
			$attributes = is_array($attributes) ? $attributes : $this->attributeStrToArray($attributes); 
			foreach($this->handlersInitNode as $handler) { 
				if(!is_null($node = $handler->initNode($tagName, $attributes))) {
					return $node;
				}
			}
		}
		return new EmptyCompositeNode(); 
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
		if($state != 0) {
			throw new Exception('Attribute syntax error');
		}
		return $attr;
	}
} 