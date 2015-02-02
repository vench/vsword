<?php


/**
 * Class BrNode make a page break.
 *
 * @version 1.0.1
 * @author v.raskin
 * @package vsword.node
 */
class BrNode extends Node implements ILineContext {
    	public function getWord() {
		return '<w:br/>';
	}
}
