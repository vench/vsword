<?php

/**
*  Class DrawingNodeNodeAddeded.
* 
*  @version 1.0.0
*  @author v.raskin
 * @package vsword.parser.addesed
*/
class DrawingNodeNodeAddeded extends NodeAddeded {
    
    function addNode( $node,  $target) {  
		if($target instanceof PCompositeNode) {
		    $target->addNode($node);
		    return true;
		}
		if($target instanceof BodyCompositeNode) {
		    $p = $this->initNode('p');
		    $p->addNode($node );
		    $target->addNode($p);
		    return true;
		}
		if($target instanceof TableColCompositeNode) {
		    $p = $this->initNode('p');
		    $p->addNode($node );
		    $target->addNode($p);
		    return true;
		}
		return false;
    }
}