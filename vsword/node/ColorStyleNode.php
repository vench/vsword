<?php

/**
 * Description of FontSizeStyleNode
 *
 * @author v.raskin
 * @version 1.0.1
 * @package vsword.node
 */
class ColorStyleNode extends Node implements INodeStyle {
	
	protected $color;
	
	/**
	* @param string $color  
	*/
	public function __construct($color = NULL) { 
		if(!is_null($color)){
			$this->color = $color;
		} 
	}

	public function getWord() {
		return !is_null($this->color) ? '<w:color w:val="'.$this->color.'"/>' : '';
	}
}