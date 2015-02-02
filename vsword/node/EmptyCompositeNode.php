<?php
/**
 * Class EmptyCompositeNode
 *
 * @version 1.0.1
 * @author v.raskin
 * @package vsword.node
 */
class EmptyCompositeNode extends CompositeNode {
	
	public function getWord() {
		$string = array();
		$string[] = $this->beforeRenderChildrensWord();
		foreach($this->childrens as $node) {
			$string[] = $node->getWord();
		}
		$string[] = $this->afterRenderChildrensWord();
		return join('',$string);
	}
	
	protected function beforeRenderChildrensWord() {
		return '';
	}
	
	protected function afterRenderChildrensWord() {
		return '';
	}
}