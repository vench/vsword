<?php

 
/**
*  Class ListItemCompositeNode
* 
*  @version 1.0.3
*  @author v.raskin
 * @package vsword.node
*/
class ListItemCompositeNode extends PCompositeNode {
    
        /**
	*
	* @var int 
	*/
        protected $level = 0;
	
	/**
	 * 
	 * @param type $level
	 */
	public function setLevel($level) {
	    $this->level = $level;
	}
	
	/**
	* 
	* @return int
	*/
       public function getLevel() {
	   return $this->level;
       }

	protected function beforeRenderChildrensWord() { 
		$num = new ArbitraryCompositeNode('w:numPr');   
		$this->getPPr()->addNode($num); 
		$num->addNode( new ArbitraryNode('w:ilvl', array(
		    'w:val'=>$this->getLevel(),
		))); 
		$num->addNode( new ArbitraryNode('w:numId', array(
		    'w:val'=>'1',
		))); 
		return parent::beforeRenderChildrensWord();
	}
}
