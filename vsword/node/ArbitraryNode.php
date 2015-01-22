<?php



/**
 * Description of ArbitraryNode
 *
 * @author v.raskin
 */
class ArbitraryNode extends Node {
	protected $name; 
	
	public function __construct($name, $attributes = NULL) {
		$this->name = $name;
		if(!is_null($attributes)) {
		    $this->addAttributes($attributes);
		}
	}
	
    	public function getWord() {
		return '<'.$this->name.$this->attributeToString().'/>';
	}
}
