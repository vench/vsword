<?php
/**
* Class DocumentCompositeNode
* 
*  @version 1.0.2
*  @author v.raskin
*  @package vsword.node
*/
class DocumentCompositeNode extends EmptyCompositeNode {

	public function addNode(BodyCompositeNode $node) {
		return parent::addNode($node);
	}

	protected function beforeRenderChildrensWord() {
		return '<w:document'.$this->attributeToString().'>';
	}
	
	protected function afterRenderChildrensWord() {
		return '</w:document>';
	}
}