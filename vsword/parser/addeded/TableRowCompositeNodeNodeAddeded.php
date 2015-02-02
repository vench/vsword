<?php

/**
*  Class TableRowCompositeNodeNodeAddeded
*
*  @version 1.0.1
*  @author v.raskin
 * @package vsword.parser.addesed
*/
class TableRowCompositeNodeNodeAddeded  extends NodeAddeded { 
    function addNode( $node,  $target) {   
		if($target instanceof TableCompositeNode) {
		    $target->addNode($node);
		    return true;
		}
		if($target instanceof BodyCompositeNode) {
			$table = $this->initNode('table');
			$table->addNode($node);
		    $target->addNode($table);
		    return true;
		}
		return false;
    }
}