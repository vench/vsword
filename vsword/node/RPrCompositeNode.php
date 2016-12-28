<?php

/**
 *  Class RPrCompositeNode
 * 
 *  @version 1.0.0
 *  @author v.raskin
 * @package vsword.node
 */
class RPrCompositeNode extends EmptyCompositeNode implements INodeStyleAdded {

    /**
     * 
     * @param INodeStyle $node
     * @return int
     */
    public function addNode($node) {
        if (!($node instanceof INodeStyle)) {
            throw new Exception("Invalid type Node {INodeStyle}");
        }
        return parent::addNode($node);
    }

    protected function beforeRenderChildrensWord() {
        return '<w:rPr>';
    }

    protected function afterRenderChildrensWord() {
        return '</w:rPr>';
    }

}
