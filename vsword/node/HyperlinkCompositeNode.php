<?php

/**
 *  Class HyperlinkCompositeNode
 * 
 *  @version 1.0.2
 *  @author v.raskin
 *  @package vsword.node
 */
class HyperlinkCompositeNode extends EmptyCompositeNode implements INodeTextAdded {

    /**
     *
     * @var string
     */
    private $linkId;

    /**
     * 
     * @param string $linkId
     */
    public function __construct($linkId = null) {
        $this->setLinkId($linkId);
    }

    /**
     * 
     * @param string $linkId
     */
    public function setLinkId($linkId) {
        $this->linkId = $linkId;
    }

    /**
     * 
     * @param type $string
     * @return type
     */
    public function addText($string) {
        return $this->getLastRCompositeNode()->addText($string);
    }

    /**
     * 
     * @return \RCompositeNode
     */
    public function getLastRCompositeNode() {
        $node = $this->getLastNode();
        if (is_null($node) || !($node instanceof RCompositeNode)) {
            $node = new RCompositeNode();
            $this->addNode($node);
        }
        return $node;
    }

    /**
     * 
     * @return string
     */
    protected function beforeRenderChildrensWord() {
        return !is_null($this->linkId) ? '<w:hyperlink r:id="' . $this->linkId . '">' : '<w:hyperlink   w:history="1">';
    }

    /**
     * 
     * @return string
     */
    protected function afterRenderChildrensWord() {
        return '</w:hyperlink>';
    }

}
