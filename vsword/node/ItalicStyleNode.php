<?php

class ItalicStyleNode extends Node implements INodeStyle {
	public function getWord() {
		return '<w:i/>';
	}
}