<?php
 

/**
*  Class PageBreakNode
*  @version 1.0.0
*  @author v.raskin
*/
class PageBreakNode extends Node  {
    	public function getWord() {
		return '<w:br w:type="page"/>';
	}
}
