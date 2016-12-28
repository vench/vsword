<?php

/**
 * Class DocumentCompositeNode
 * 
 *  @version 1.0.2
 *  @author v.raskin
 *  @package vsword.node
 */
class DocumentCompositeNode extends EmptyCompositeNode {

    /**
     * 
     * @param BodyCompositeNode $node
     * @return int
     * @throws Exception
     */
    public function addNode($node) {
        if (!($node instanceof BodyCompositeNode)) {
            throw new Exception("Invalid type Node {BodyCompositeNode}");
        }
        return parent::addNode($node);
    }

    protected function beforeRenderChildrensWord() {
        return '<w:document' . $this->attributeToString() . '>';
    }

    protected function afterRenderChildrensWord() {
        return '</w:document>';
    }

}
