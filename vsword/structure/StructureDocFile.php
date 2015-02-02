<?php
/**
 * Class StructureDocFile
 * @version 1.0.2
 * @author v.raskin
 * @package vsword.structure
*/
abstract class StructureDocFile {
	protected $name;
	
	public function getName() {
		return $this->name;
	}
	
	abstract function getContent();
	
	 
	
	public function getXMLHeader() {
		return '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
	}
}