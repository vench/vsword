<?php

/**
*  Class TableCompositeNode
*
*  @version 1.0.0
*  @author v.raskin
 * @package vsword.node
*/
class TableCompositeNode extends EmptyCompositeNode implements IBlockContext  {

	/**
	* @param TableRowCompositeNode
	*/
	public function addNode( $node) {
		return parent::addNode($node);
	}
	
	protected function beforeRenderChildrensWord() {
		$xml = '<w:tbl><w:tblPr>';		
		 if(!is_null($this->styleId)) {
		 	$xml .= '<w:tblStyle w:val="'.$this->styleId.'"/>';
		 }
		 $xml .='<w:tblW w:w="0" w:type="auto"/><w:tblLook w:val="04A0" w:firstRow="1" w:lastRow="0" w:firstColumn="1" w:lastColumn="0" w:noHBand="0" w:noVBand="1"/></w:tblPr> <w:tblGrid><w:gridCol w:w="4785"/><w:gridCol w:w="4786"/></w:tblGrid>';
		return $xml; 
	}
	
	protected function afterRenderChildrensWord() {
		return '</w:tbl>';
	}
} 