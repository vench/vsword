<?php

/**
*  Class PCompositeNode
*  @version 1.0.0
*  @author v.raskin
 * @package vsword.node
*/
class PCompositeNode extends EmptyCompositeNode  implements INodeTextAdded, IBlockContext, IPNodeStyleAdded {
        
	/**
	 *
	 * @var PPrCompositeNode 
	 */
	protected  $pPr;

	 
	public function __construct() {
	    $this->addNode($this->getPPr());
	}
	
	/**
	 * 
	 * @param IPNodeStyle $node
	 */
	public function addPNodeStyle(IPNodeStyle $node) {
		$this->getPPr()->addPNodeStyle($node);
	}
	
	/**
	 * 
	 * @return PCompositeNode
	 */
	public function getPPr() {
	    if(is_null($this->pPr)) {
			$this->pPr = new PPrCompositeNode();
	    }
	    return $this->pPr;
	}

	/**
	* Add some text to last node RCompositeNode
	* @param string $text
	* @return INode
	*/
	public function addText($text) {  
		return $this->getLastRCompositeNode()->addText($text);  
	}
		
	/**
	* 
	* @return \RCompositeNode
	*/
	public function getLastRCompositeNode() {
		$node = $this->getLastNode();
		if(is_null($node) || !($node instanceof  RCompositeNode)) {
		    $node = new RCompositeNode();
		    $this->addNode($node);
		}
		return $node;
	}
	
	/**
	* 
	*/
	public function clearTextStyle() {
		$this->addNode(new RCompositeNode());
	}
        
      
        
	protected function beforeRenderChildrensWord() {
		$this->getPPr()->setStyleID($this->styleId);
		return '<w:p>';
	}
	
	protected function afterRenderChildrensWord() {
		return '</w:p>';
	}
}