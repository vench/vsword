<?php

/**
*  Class TableColCompositeNodeNodeAddeded
*
*  @version 1.0.1
*  @author v.raskin
 * @package vsword.parser.addesed
*/
class TableColCompositeNodeNodeAddeded  extends NodeAddeded { 
    function addNode( $node,  $target) {  
		if($target instanceof TableRowCompositeNode) {
		    $target->addNode($node);
		    return true;
		}
		if($target instanceof BodyCompositeNode) {
		    $table = $this->initNode('table'); 
		    $target->addNode($table);
			$tr = $this->initNode('tr');
			$table->addNode($tr);
			$tr->addNode($node); 
		    return true;
		}
		return false;
    }
}