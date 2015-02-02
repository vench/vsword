<?php

/**
*  Class BodyCompositeNode
* 
*  @version 1.0.1
*  @author v.raskin
*  @package vsword.node
*/
class BodyCompositeNode extends EmptyCompositeNode implements INodeTextAdded {
        
	/**
	* 
	* @return \PCompositeNode
	*/ 
	public function addPNode() {
		$node = new PCompositeNode();
		$this->addNode($node); 
		return $node;
	}
	
	
	/**
	* Add some text to last node PCompositeNode
	* @param string $text
	* @return INode
	*/
	public function addText($text) {   		          
		return $this->getLastPCompositeNode()->addText($text);            
	}
	
	
	/**
	* Gel last node PCompositeNode if exists or create PCompositeNode
	* @return \PCompositeNode
	*/
	public function getLastPCompositeNode() {
		$node = $this->getLastNode();
		if(is_null($node) || !($node instanceof  PCompositeNode)) {
                $node = $this->addPNode();
		}
		return $node;
	}
        
    
	protected function beforeRenderChildrensWord() {
		return '<w:body>';
	}
	
	protected function afterRenderChildrensWord() {
		return '</w:body>';
	}
}