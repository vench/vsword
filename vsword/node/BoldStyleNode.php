<?php

class BoldStyleNode extends Node implements INodeStyle {
	public function getWord() {
		return '<w:b/>';
	}
}