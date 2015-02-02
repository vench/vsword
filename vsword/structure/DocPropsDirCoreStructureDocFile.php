<?php

/**
 * Class DocPropsDirCoreStructureDocFile
 * @version 1.0.2
 * @author v.raskin
 * @package vsword.structure
*/
class DocPropsDirCoreStructureDocFile  extends StructureDocFile {
	public function __construct() {
		$this->name = 'core.xml';
	}
	
	public function getContent() {
		return '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<cp:coreProperties xmlns:cp="http://schemas.openxmlformats.org/package/2006/metadata/core-properties" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:dcterms="http://purl.org/dc/terms/" xmlns:dcmitype="http://purl.org/dc/dcmitype/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><dc:creator>adm</dc:creator><cp:lastModifiedBy>adm</cp:lastModifiedBy><cp:revision>1</cp:revision><dcterms:created xsi:type="dcterms:W3CDTF">2015-01-15T14:01:00Z</dcterms:created><dcterms:modified xsi:type="dcterms:W3CDTF">2015-01-15T14:01:00Z</dcterms:modified></cp:coreProperties>';
	}
}