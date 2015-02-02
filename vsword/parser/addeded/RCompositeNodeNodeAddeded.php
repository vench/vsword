<?php

/**
* Class RCompositeNodeNodeAddeded
*
*  @version 1.0.1
*  @author v.raskin
 * @package vsword.parser.addesed
*/
class RCompositeNodeNodeAddeded extends NodeAddeded {
    
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
		return false;
    }
}