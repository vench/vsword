<?php

/**
* Class CompositeNode
* 
*  @version 1.0.2
*  @author v.raskin
*  @package vsword.node
*/
abstract class CompositeNode extends Node {
	
	protected $childrens = array();
	
	/**
	* @return int 
	*/
	public function addNode(INode $node) {
		$this->childrens[] = $node;
		$node->setParent($this);
		return sizeof($this->childrens) - 1;
	}
	
	/**
	* @return INode[]
	*/
	public function getChildrens() {
		return $this->childrens;
	}
	
	/**
	* @return INode
	*/
	public function getNode($index) {
		return isset($this->childrens[$index]) ? $this->childrens[$index] : NULL;
	}
        
    /**
	* 
	* @return INode
	*/
    public function getLastNode() {
		return sizeof($this->childrens) > 0 ? $this->childrens[sizeof($this->childrens)-1] : NULL;           
	}
	
	public function afterNode() {
		return NULL;
	}
	
	
	/**
	* @return string
	*/
	public function look($tab = '') {
		$str = parent::look($tab);
		$tab .= "\t";
		foreach($this->childrens as $child)
			$str .= $tab.$child->look($tab);
		return $str;
	}
	
}








 