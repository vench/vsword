<?php

/**
* Class ListCompositeNodeNodeAddeded
*
*  @version 1.0.2
*  @author v.raskin
 * @package vsword.parser.addesed
*/
class ListCompositeNodeNodeAddeded  extends NodeAddeded { 
     
	    
    function addNode( $node,  $target) {  
		if($target instanceof BodyCompositeNode) { 
		    $target->addNode($node);   
		    return true;
		}  
		if($target instanceof ListCompositeNode) {
			$target->addNode($node);   
		    return true;
		}
		return false;
    }
}