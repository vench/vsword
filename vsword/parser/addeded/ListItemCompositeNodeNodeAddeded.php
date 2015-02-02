<?php

/**
*  Class ListItemCompositeNodeNodeAddeded
*
*  @version 1.0.2
*  @author v.raskin
 * @package vsword.parser.addesed
*/
class ListItemCompositeNodeNodeAddeded  extends NodeAddeded { 
    function addNode( $node,  $target) {  
		if($target instanceof ListCompositeNode) {
		    $target->addNode($node);
			$node->setLevel($this->getLevel());
		    return true;
		}
		if($target instanceof BodyCompositeNode) {  
		    $list = $this->initNode('ul');  
		    $list->addNode($node );
		    $target->addNode($list);  
			$node->setLevel($this->getLevel());
		    return true;
		}
		return false;
    }
	
	/**
	* @return int 
	*/
	protected function getLevel() {
		$level = 0;
		$html = $this->getParser()->getCurrentHTMLNode();
		if($html->getName() == 'li') {  
				while(!is_null($html = $html->getParent())) {
					if($html->getName() == 'li') {
						$level ++; 
					}
				}
				 
			}
		return $level;
	}
}