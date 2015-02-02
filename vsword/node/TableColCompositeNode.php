<?php


/**
*  Class TableColCompositeNode
*
*  @version 1.0.0
*  @author v.raskin
 * @package vsword.node
*/
class TableColCompositeNode extends EmptyCompositeNode implements INodeTextAdded {


	/**
	* Add some text to last node PCompositeNode
	* @param string $text
	*/
	public function addText($text) {   		          
		return $this->getLastPCompositeNode()->addText($text);            
	}
	
	/**
	* @return PCompositeNode
	*/
	public function getLastPCompositeNode() {
		$node = $this->getLastNode();
		if(is_null($node) || !($node instanceof  PCompositeNode)) {
                $node = new PCompositeNode();
                $this->addNode($node);
		}
		return $node;
	}

	public function addNode($node) {
		return parent::addNode($node);
	}

	protected function beforeRenderChildrensWord() {
		return '<w:tc><w:tcPr><w:tcW w:w="4785" w:type="dxa"/></w:tcPr>';
	}
	
	protected function afterRenderChildrensWord() {
		return '</w:tc>';
	}
}