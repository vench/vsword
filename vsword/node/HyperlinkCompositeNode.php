<?php

/**
*  Class RPrCompositeNode
* 
*  @version 1.0.0
*  @author v.raskin
*/
class RPrCompositeNode extends EmptyCompositeNode {
	protected function beforeRenderChildrensWord() {
		return '<w:hyperlink   w:history="1">';
	}
	
	protected function afterRenderChildrensWord() {
		return '</w:hyperlink>';
	}
}