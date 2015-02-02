<?php

/**
*  Class TableCompositeNodeNodeAddeded
*
*  @version 1.0.1
*  @author v.raskin
 * @package vsword.parser.addesed
*/
class TableCompositeNodeNodeAddeded extends NodeAddeded {
    function addNode( $node,  $target) {    
		if($target instanceof BodyCompositeNode) {
		    $target->addNode($node);
		    return true;
		}
		if($target instanceof ListItemCompositeNode) { 
		    $target->addNode($node);
		    $target->addNode( $this->initNode('p'));
		    return true;
		}
		return false;
    }	
}