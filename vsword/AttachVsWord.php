<?php

 

/**
 * Class AttachVsWord
 * 
 * @version 1.0.1
 * @author v.raskin
 */
class AttachVsWord {

	 
	
	/**
	* rId by WordDirRelsDirDocumentStructureDocFile
	* @var string
	*/
	public $rId;
	
	public $type;
	
	public $target;
	
	public function __construct($key, $target, $type){
		$this->rId = $key;
		$this->target = $target;
		$this->type = $type;
	} 
	
	public function getBaseName() {
		return basename($this->target);
	}
	 
	/**
	* @return boolean
	*/ 
	public function isRemote() {
		return substr($this->target, 0, 4) === 'http';
	} 
}