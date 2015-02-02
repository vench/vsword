<?php
/**
*  Class TableStyle
*
*  @version 1.0.0
*  @author v.raskin
 * @package vsword.structure.style
*/
class TableStyle extends Style {

	protected $borderSize = 0;
	
	public function __construct($borderSize = 0) {
		$this->setBorderSize($borderSize);
	}
	
	public function setBorderSize($borderSize) {
		$this->borderSize = $borderSize;
	}

	public function getStyle() {
		return ' <w:style w:type="table" w:styleId="'.$this->getStyleId().'">
 		<w:name w:val="'.$this->getName().'"/><w:basedOn w:val="a1"/><w:uiPriority w:val="59"/><w:rsid w:val="00645CDE"/><w:pPr><w:spacing w:after="0" w:line="240" w:lineRule="auto"/></w:pPr><w:tblPr>
		<w:tblBorders>
			<w:top w:val="single" w:sz="'.$this->borderSize.'" w:space="0" w:color="auto"/>
			<w:left w:val="single" w:sz="'.$this->borderSize.'" w:space="0" w:color="auto"/>
			<w:bottom w:val="single" w:sz="'.$this->borderSize.'" w:space="0" w:color="auto"/>
			<w:right w:val="single" w:sz="'.$this->borderSize.'" w:space="0" w:color="auto"/>
			<w:insideH w:val="single" w:sz="'.$this->borderSize.'" w:space="0" w:color="auto"/>
			<w:insideV w:val="single" w:sz="'.$this->borderSize.'" w:space="0" w:color="auto"/>
		</w:tblBorders></w:tblPr></w:style>';
	}
}