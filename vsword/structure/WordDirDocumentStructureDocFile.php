<?php
/**
 * Class WordDirDocumentStructureDocFile
 * @version 1.0.2
 * @author v.raskin
 * @package vsword.structure
*/
class WordDirDocumentStructureDocFile extends StructureDocFile {

	/**
	* @var BodyCompositeNode
	*/
	protected $body = NULL;

	public function __construct() {
		$this->name = 'document.xml';		
	}
	
	/**
	* @return BodyCompositeNode
	*/
	public function getBody() {
		if(is_null($this->body)) {
			$this->body = new BodyCompositeNode();
		}
		return $this->body;
	}
	
	public function getContent() { 
		$document = new DocumentCompositeNode();
		$document->addAttributes(array(
				 'xmlns:wpc'=>"http://schemas.microsoft.com/office/word/2010/wordprocessingCanvas", 
				 'xmlns:mc'=>"http://schemas.openxmlformats.org/markup-compatibility/2006" ,
				 'xmlns:o'=>"urn:schemas-microsoft-com:office:office" ,
				 'xmlns:r'=>"http://schemas.openxmlformats.org/officeDocument/2006/relationships", 
				 'xmlns:m'=>"http://schemas.openxmlformats.org/officeDocument/2006/math" ,
				 'xmlns:v'=>"urn:schemas-microsoft-com:vml" ,
				 'xmlns:wp14'=>"http://schemas.microsoft.com/office/word/2010/wordprocessingDrawing", 
				 'xmlns:wp'=>"http://schemas.openxmlformats.org/drawingml/2006/wordprocessingDrawing", 
				 'xmlns:w10'=>"urn:schemas-microsoft-com:office:word" ,
				 'xmlns:w'=>"http://schemas.openxmlformats.org/wordprocessingml/2006/main", 
				 'xmlns:w14'=>"http://schemas.microsoft.com/office/word/2010/wordml" ,
				 'xmlns:wpg'=>"http://schemas.microsoft.com/office/word/2010/wordprocessingGroup", 
				 'xmlns:wpi'=>"http://schemas.microsoft.com/office/word/2010/wordprocessingInk" ,
				 'xmlns:wne'=>"http://schemas.microsoft.com/office/word/2006/wordml" ,
				 'xmlns:wps'=>"http://schemas.microsoft.com/office/word/2010/wordprocessingShape", 
				 'mc:Ignorable'=>"w14 wp14",
		));  		
		$document->addNode($this->getBody()); 
		$string = array(
			$this->getXMLHeader(),
			$document->getWord(),
		); 
		
		return join('', $string);
	}
}