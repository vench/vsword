<?php

/**
 * Class WordDirRelsDirDocumentStructureDocFile
 * @version 1.0.2
 * @author v.raskin
 * @package vsword.structure
*/
class WordDirRelsDirDocumentStructureDocFile extends StructureDocFile {

	const TYPE_THEME1 = 'http://schemas.openxmlformats.org/officeDocument/2006/relationships/theme';	
	const TYPE_STYLESWITHEFFECTS = 'http://schemas.microsoft.com/office/2007/relationships/stylesWithEffects';	
	const TYPE_FONTTABLE = 'http://schemas.openxmlformats.org/officeDocument/2006/relationships/fontTable';
	const TYPE_STYLES = 'http://schemas.openxmlformats.org/officeDocument/2006/relationships/styles';
	const TYPE_NUMBERING = 'http://schemas.openxmlformats.org/officeDocument/2006/relationships/numbering';
	const TYPE_IMAGE = 'http://schemas.openxmlformats.org/officeDocument/2006/relationships/image';
	const TYPE_WEBSETTINGS = 'http://schemas.openxmlformats.org/officeDocument/2006/relationships/webSettings';
	const TYPE_SETTINGS = 'http://schemas.openxmlformats.org/officeDocument/2006/relationships/settings';
	
	public $stack = array();
	
	public function __construct() {
		$this->name = 'document.xml.rels'; 
				//set default rels
		$this->registerRels("theme/theme1.xml", self::TYPE_THEME1);
		$this->registerRels("stylesWithEffects.xml", self::TYPE_STYLESWITHEFFECTS);
		$this->registerRels("fontTable.xml", self::TYPE_FONTTABLE);
		$this->registerRels("styles.xml", self::TYPE_STYLES);
		$this->registerRels("numbering.xml", self::TYPE_NUMBERING);
		$this->registerRels("webSettings.xml", self::TYPE_WEBSETTINGS);
		$this->registerRels("settings.xml", self::TYPE_SETTINGS);
	}
	
  
	
	/**
	 * 
	 * @param type $target
	 * @return array
	 */
	public function registerImage($target) {  
		return $this->registerRels('media/'.basename($target), self::TYPE_IMAGE);  
	}
	
	/**
	* @return array
	*/
	public function registerRels($target, $type) {
		if($this->validateType($type)) {	
			 $key = 'rId'.(sizeof($this->stack) + 1);	 
			 $this->stack[$key] = array($target, $type, $key); 
			 return $this->stack[$key];
		}
		return NULL;
	}
	
	/**
	 * 
	 * @param string $type
	 * @return boolean
	 */
	public function validateType($type) {
		return in_array($type, array(
			self::TYPE_THEME1,
			self::TYPE_STYLESWITHEFFECTS,
			self::TYPE_FONTTABLE,
			self::TYPE_STYLES,
			self::TYPE_NUMBERING,
			self::TYPE_IMAGE,
			self::TYPE_WEBSETTINGS,
			self::TYPE_SETTINGS,
		));
	}
	
	
	public function getContent() { 
		$strings = array(
			$this->getXMLHeader(),
			'<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">',
		);
		foreach($this->stack as $item) { 
			list($target, $type, $key) = $item;
			$strings[] = '<Relationship Id="'.$key.'" Type="'.$type.'" Target="'.$target.'"/>';
		}
		$strings[] = '</Relationships>';
		return  join('', $strings);
	}
}