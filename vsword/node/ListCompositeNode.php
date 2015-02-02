<?php

 

/**
* Class ListCompositeNode
*
*  @version 1.0.2
*  @author v.raskin
*  @package vsword.node
*/
class ListCompositeNode extends EmptyCompositeNode {
    
    /**
     *
     * @var int 
     */
    protected $level = 0;
    
    /**
     * 
     * @param int $level
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
    
    /**
     * 
     */
    public function addLevel() {
	$this->level ++;
    }


    /**
    * @param ListItemCompositeNode $node
    */
    public function addNode( $node) {
	$node->setStyleID($this->styleId); 
	$node->setLevel( $this->getLevel() );
        return parent::addNode($node);
    }
}