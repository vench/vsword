<?php

/**
*  Class TableRowCompositeNode
*
*  @version 1.0.0
*  @author v.raskin
 * @package vsword.node
*/
class TableRowCompositeNode extends EmptyCompositeNode {
	
	/**
	* @param TableColCompositeNode
	*/
	public function addNode( $node) {
		return parent::addNode($node);
	}
	
	protected function beforeRenderChildrensWord() {
		return '<w:tr>';
	}
	
	protected function afterRenderChildrensWord() {
		return '</w:tr>';
	}
}