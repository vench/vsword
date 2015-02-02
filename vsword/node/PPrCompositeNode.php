<?php

 

/**
*  Class PPrCompositeNode
* 
*  @version 1.0.0
*  @author v.raskin
 * @package vsword.node
*/
class PPrCompositeNode extends EmptyCompositeNode implements IPNodeStyleAdded {

    
	/**
	 * 
	 * @param IPNodeStyle $node
	 */
	public function addPNodeStyle(IPNodeStyle $node) {
		$this->addNode($node);
	}
	
	protected function beforeRenderChildrensWord() {	
		if(!is_null($this->styleId)) {
			$this->addNode( new ArbitraryNode('w:pStyle', array(
				'w:val'=>$this->styleId,
			)) );   
		}
		return '<w:pPr>';
	}
	
	protected function afterRenderChildrensWord() {
		return '</w:pPr>';
	}
}
