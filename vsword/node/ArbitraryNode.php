<?php



/**
 * Class ArbitraryNode
 *
 * @version 1.0.2
 * @author v.raskin
 * @package vsword.node
 */
class ArbitraryNode extends Node {
	protected $name; 
	
	public function __construct($name, $attributes = NULL) {
		$this->name = $name;
		if(!is_null($attributes)) {
		    $this->addAttributes($attributes);
		}
	}
	
	public function getName() {
		return $this->name;
	}
	
    public function getWord() {
		return '<'.$this->name.$this->attributeToString().'/>';
	}
	
	public function __toString() {
		return get_class($this).':'.$this->name;
	}
}
