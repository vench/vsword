<?php

 

/**
 * Class AttachVsWord
 * 
 * @version 1.0.1
 * @author v.raskin
 * @package vsword
 */
class AttachVsWord {

	 
	
	/**
	* rId by WordDirRelsDirDocumentStructureDocFile
	* @var string
	*/
	public $rId;
	
	/**
	 *
	 * @var string 
	 */
	public $type;
	
	/**
	 *
	 * @var string 
	 */
	public $target;
	
	/**
	 * 
	 * @param string $key
	 * @param string $target
	 * @param string $type
	 */
	public function __construct($key, $target, $type){
		$this->rId = $key;
		$this->target = $target;
		$this->type = $type;
	} 
	
	/**
	 * 
	 * @return string
	 */
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