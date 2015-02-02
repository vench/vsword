<?php

/**
*  Class TableStyle
*
*  @version 1.0.0
*  @author v.raskin
 * @package vsword.structure.style
*/
class ListStyle extends Style {

	const TYPE_NUMERIC = 1;
	const TYPE_MARKER = 2;
	
	protected $type;
	
	public function __construct($type = 1) {
		$this->setType($type);
	}
	
	public function setType($type) {
		$this->type = $type;
	}
	
	public function getStyle() {
		if($this->type == self::TYPE_NUMERIC) {
			return '';
		} 
		
		return '<w:style w:type="paragraph" w:styleId="'.$this->getStyleId().'"><w:name w:val="'.$this->getName().'"/><w:basedOn w:val="a"/><w:uiPriority w:val="34"/><w:qFormat/><w:rsid w:val="00E404C0"/><w:pPr><w:ind w:left="720"/><w:contextualSpacing/></w:pPr></w:style>';
	 
	}
}