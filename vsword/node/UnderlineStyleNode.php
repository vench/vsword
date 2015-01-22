<?php

/**
*  Class UnderlineStyleNode
*  @version 1.0.0
*  @author v.raskin
*/
class UnderlineStyleNode extends Node implements INodeStyle {
	public function getWord() {
		return '<w:u/>';
	}
}