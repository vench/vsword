<?php
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