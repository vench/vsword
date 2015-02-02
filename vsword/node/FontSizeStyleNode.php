<?php

 

/**
 * Description of FontSizeStyleNode
 *
 * @author v.raskin
 * @version 1.0.1
 * @package vsword.node
 */
class FontSizeStyleNode extends Node implements INodeStyle {
	
	protected $size;
	
	/**
	* @param int $size enum px
	* @param int $cSize enum px
	*/
	public function __construct($size = NULL, $cSize = NULL) {
		$this->size  = $this->cSize = $size;
		if(!is_null($cSize)){
			$this->cSize = $cSize;
		} 
	}

	public function getWord() {
		return !is_null($this->size) ? '<w:sz w:val="'.($this->size * 2).'"/><w:szCs w:val="'.($this->cSize * 2).'"/>' : '';
	}
}