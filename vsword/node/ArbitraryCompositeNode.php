<?php

/**
*  Class ArbitraryCompositeNode
* 
*  @version 1.0.3
*  @author v.raskin
*  @package vsword.node
*/
class ArbitraryCompositeNode extends EmptyCompositeNode {
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
	
	public function getHtml() {
		$str = $this->beforeRenderChildrensWord();
		foreach($this->childrens as $child) {
		    $str .= $child->getHtml();
		}
		$str .= $this->afterRenderChildrensWord();
		return $str;
	}
	
	protected function beforeRenderChildrensWord() {
		return '<'.$this->name.$this->attributeToString().'>';
	}
	
	protected function afterRenderChildrensWord() {
		return '</'.$this->name.'>';
	}
	
	/**
	* @return string
	*/
	public function look($tab = '') {
		$str = $tab.($this).':'.$this->name."\n";;
		$tab .= "\t";
		foreach($this->childrens as $child)
			$str .= $tab.$child->look($tab);
		return $str;
	}
	
	
}