<?php


/**
 * Class BrNode
 *
 * @version 1.0.0
 * @author v.raskin
 */
class BrNode extends Node implements ILineContext {
    	public function getWord() {
		return '<w:br/>';
	}
}
