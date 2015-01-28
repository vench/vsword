<?php

/**
*  Class HyperlinkCompositeNode
* 
*  @version 1.0.1
*  @author v.raskin
*/
class HyperlinkCompositeNode  extends EmptyCompositeNode {
	protected function beforeRenderChildrensWord() {
		return '<w:hyperlink   w:history="1">';
	}
	
	protected function afterRenderChildrensWord() {
		return '</w:hyperlink>';
	}
}
