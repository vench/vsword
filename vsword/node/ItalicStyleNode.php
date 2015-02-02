<?php

/**
*  Class ItalicStyleNode
* 
*  @version 1.0.2
*  @author v.raskin
*  @package vsword.node
*/
class ItalicStyleNode extends Node implements INodeStyle {
	public function getWord() {
		return '<w:i/>';
	}
}