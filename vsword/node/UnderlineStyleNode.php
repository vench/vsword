<?php

/**
*  Class UnderlineStyleNode

*  @version 1.0.1
*  @author v.raskin
 * @package vsword.node
*/
class UnderlineStyleNode extends Node implements INodeStyle {
	public $style = 'single';
	public function getWord() {
		return '<w:u w:val="' . $this->style.'"/>';
	}
}
