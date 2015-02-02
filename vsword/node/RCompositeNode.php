<?php

/**
*  Class RCompositeNode
*  @version 1.0.0
*  @author v.raskin
 * @package vsword.node
*/
class RCompositeNode extends EmptyCompositeNode implements INodeTextAdded, ILineContext {
    
	/**
	 * 
	 * @param INodeStyle $node
	 */
	public function addTextStyle(INodeStyle $node) {
		$this->getLastRPrCompositeNode()->addNode($node);
	}
	
	/**
	* @param string $text
	* @return INode
	*/
	public function addText($text) {    
		$this->addNode( new TextNode($text)); 
		return $this;
	}
        
	/**
	* 
	* @return \RPrCompositeNode
	*/
	public function getLastRPrCompositeNode() {
            $node = $this->getLastNode();
            if(is_null($node) || !($node instanceof  RPrCompositeNode)) {
                $node = new RPrCompositeNode();
                $this->addNode($node);
            }
            return $node;
	}
    
	protected function beforeRenderChildrensWord() {
		return '<w:r>';
	}
	
	protected function afterRenderChildrensWord() {
		return '</w:r>';
	}
}