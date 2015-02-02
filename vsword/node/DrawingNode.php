<?php

 
/**
 * Class DrawingNode
 *
 * @version 1.0.1
 * @author v.raskin
 * @package vsword.node
 */
class DrawingNode extends Node {

	const PX_ENUM = 8625;
	
	/**
	 *
	 * @var AttachVsWord 
	 */
	protected $attachImage;
	
	/**
	 * 
	 * @param Attach $attach
	 */
	public function addImage(AttachVsWord $attach ) {
		$this->attachImage = $attach;
	}
	
	/**
	*  @return boolean
	*/
	public function fileExists($fileName) {
		return (file_exists($fileName) || @file_get_contents($fileName, false, NULL, -1, 1) !== FALSE);
	}
	
	
	public function getWord() {
		$xml = '';  
		if(!is_null($this->attachImage) && $this->fileExists($this->attachImage->target)){
			list($width, $height) = getimagesize($this->attachImage->target);	   
			$xml = '<w:r><w:drawing><wp:inline distT="0" distB="0" distL="0" distR="0"><wp:extent cx="'.($width * self::PX_ENUM).'" cy="'.($height * self::PX_ENUM).'"/><wp:effectExtent l="19050" t="0" r="0" b="0"/><wp:docPr id="2" name="'.$this->attachImage->getBaseName().'"/><wp:cNvGraphicFramePr><a:graphicFrameLocks xmlns:a="http://schemas.openxmlformats.org/drawingml/2006/main" noChangeAspect="1"/></wp:cNvGraphicFramePr><a:graphic xmlns:a="http://schemas.openxmlformats.org/drawingml/2006/main"><a:graphicData uri="http://schemas.openxmlformats.org/drawingml/2006/picture"><pic:pic xmlns:pic="http://schemas.openxmlformats.org/drawingml/2006/picture"><pic:nvPicPr><pic:cNvPr id="0" name="help.png"/><pic:cNvPicPr/></pic:nvPicPr><pic:blipFill><a:blip r:embed="'.$this->attachImage->rId.'"><a:extLst><a:ext uri="{28A0092B-C50C-407E-A947-70E740481C1C}"><a14:useLocalDpi xmlns:a14="http://schemas.microsoft.com/office/drawing/2010/main" val="0"/></a:ext></a:extLst></a:blip><a:stretch><a:fillRect/></a:stretch></pic:blipFill><pic:spPr><a:xfrm><a:off x="0" y="0"/>			<a:ext cx="'.($width * self::PX_ENUM).'" cy="'.($height * self::PX_ENUM).'"/></a:xfrm><a:prstGeom prst="rect"><a:avLst/></a:prstGeom><a:noFill/><a:ln><a:noFill/></a:ln></pic:spPr></pic:pic></a:graphicData></a:graphic></wp:inline></w:drawing></w:r>';
				
		}		
	 	return $xml; 
	}
 
 
}