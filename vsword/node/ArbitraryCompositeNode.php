<?php


class ArbitraryCompositeNode extends EmptyCompositeNode {
	protected $name; 
	public function __construct($name) {
		$this->name = $name;
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
}