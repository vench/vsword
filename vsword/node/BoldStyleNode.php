<?php
/**
*  Class BoldStyleNode
* 
*  @version 1.0.1
*  @author v.raskin
*  @package vsword.node
*/
class BoldStyleNode extends Node implements INodeStyle {
	public function getWord() {
		return '<w:b/>';
	}
}