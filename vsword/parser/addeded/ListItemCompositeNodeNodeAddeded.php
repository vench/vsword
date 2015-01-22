<?php

/**
*  Class ListItemCompositeNodeNodeAddeded
*
*  @version 1.0.1
*  @author v.raskin
*/
class ListItemCompositeNodeNodeAddeded  extends NodeAddeded { 
    function addNode( $node,  $target) {  
		if($target instanceof ListCompositeNode) {
		    $target->addNode($node);
		    return true;
		}
		if($target instanceof BodyCompositeNode) {  
		    $list = $this->initNode('ul');  
		    $list->addNode($node );
		    $target->addNode($list);
		    
		    return true;
		}
		return false;
    }
}