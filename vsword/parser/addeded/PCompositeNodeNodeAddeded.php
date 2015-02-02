<?php

/**
*  Class PCompositeNodeNodeAddeded
*
*  @version 1.0.1
*  @author v.raskin
 * @package vsword.parser.addesed
*/
class PCompositeNodeNodeAddeded  extends NodeAddeded {
    
    function addNode( $node,  $target) { 
		if($target instanceof TableColCompositeNode) {
		    $target->addNode($node);
		    return true;
		}
		if($target instanceof ListItemCompositeNode) {
		    $target->addNode($node);
		    return true;
		}
		if($target instanceof BodyCompositeNode) {
		    $target->addNode($node);
		    return true;
		} 
		
		return false;
    }
}