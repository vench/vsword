<?php

/**
* Class ListCompositeNodeNodeAddeded
*
*  @version 1.0.1
*  @author v.raskin
*/
class ListCompositeNodeNodeAddeded  extends NodeAddeded { 
     
	    
    function addNode( $node,  $target) {  
		if($target instanceof BodyCompositeNode) {
		    $target->addNode($node);   
		    return true;
		} 
		if($target instanceof ListItemCompositeNode) {
		    $node->setLevel( $target->getLevel() );
		    $node->addLevel();   
		} 
		return false;
    }
}