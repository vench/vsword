<?php

/**
 * Class BrNodeNodeAddeded
 *
 *  @version 1.0.1
 *  @author v.raskin
 * @package vsword.parser.addesed
 */
class BrNodeNodeAddeded extends NodeAddeded {

    /**
     * 
     * @param INode $node
     * @param INode $target
     * @return boolean
     */
    function addNode($node, $target) {
        if($target instanceof TextNode) {
            $target->getParent()->addNode($node);
            return true;
        }
        if ($target instanceof RCompositeNode) {
            $target->addNode($node);
            return true;
        }
        if ($target instanceof PCompositeNode) {
            $target->getLastRCompositeNode()->addNode($node);
            return true;
        }
        if ($target instanceof BodyCompositeNode) {
            $p = $this->initNode('p');
            $p->getLastRCompositeNode()->addNode($node);
            $target->addNode($p);
            return true;
        }
        return false;
    }

}
