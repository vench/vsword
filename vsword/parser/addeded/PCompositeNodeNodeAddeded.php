<?php

/**
 *  Class PCompositeNodeNodeAddeded
 *
 *  @version 1.0.1
 *  @author v.raskin
 *  @package vsword.parser.addesed
 */
class PCompositeNodeNodeAddeded extends NodeAddeded {

    /**
     * 
     * @param \PCompositeNode $node
     * @param INode $target
     * @return boolean
     */
    function addNode($node, $target) {
        if ($target instanceof TableColCompositeNode) {
            $target->addNode($node);
            return true;
        }
        if ($target instanceof ListItemCompositeNode) {             
            $target->addNode($node->getLastRCompositeNode());             
            return true;
        }
        if ($target instanceof BodyCompositeNode) {
            $target->addNode($node);
            return true;
        }

        return false;
    }

}
