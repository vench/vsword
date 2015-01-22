<?php

 
 require_once 'interfaces.php';

/**
*  Class VsWord
*
*  @version 1.0.0
*  @author v.raskin
*/
class VsWord {

	/**
	*
	* @var array 
	*/
	protected $structure;
	
	/**
	* @var WordDirDocumentStructureDocFile
	*/
	protected $document;
	
	
	/**
	* @var WordDirRelsDirDocumentStructureDocFile
	*/
	protected $rels;
	
	/**
	* @var WordDirStylesStructureDocFile
	*/
	protected $style;
	
	/**
	 *
	 * @var AttachVsWord[] 
	 */
	protected $stackAttach = array();
	
    /**
    * 
    * @param type $from
    * @throws Exception
    */
	public function __construct($from = NULL) {
		if(!class_exists('ZipArchive')) {
                throw new Exception("Class \"ZipArchive\" not found!");
        }
		$this->structure = $this->getBaseStructureDocClasses();
	}
	
	/**
	* @return WordDirDocumentStructureDocFile
	*/
	public function getDocument() {
		if(is_null($this->document)) {
			$this->document = new WordDirDocumentStructureDocFile();
		}
		return $this->document;
	}
	
	/**
	* @return WordDirRelsDirDocumentStructureDocFile
	*/
	public function getRels() {
		if(is_null($this->rels)) {
			$this->rels = new WordDirRelsDirDocumentStructureDocFile();			
		}
		return $this->rels;
	}
	
	/**
	* @return WordDirStylesStructureDocFile
	*/
	public function getStyle() {
		if(is_null($this->style)) {
			$this->style = new WordDirStylesStructureDocFile();			
		}
		return $this->style;
	}
	
	 
	/**
	 * 
	 * @param string $fileName
	 * @return AttachVsWord
	 * @throws Exception
	 */
	public function getAttachImage($fileName) {
	    if(!file_exists($fileName) && @file_get_contents($fileName, false, NULL, -1, 1) === FALSE) {
			throw new Exception('File not found "'.$fileName.'"');
	    }
	    list($target, $type, $key) = $this->getRels()->registerImage($fileName);    
	    $this->stackAttach[] = new AttachVsWord($key, $fileName, $type);
	    return $this->stackAttach[sizeof($this->stackAttach) -1];
	}
	
    /**
    * 
    * @param type $from
    * @throws Exception
    */
	public function load($from) {
		throw new Exception("No implementation");
	}
	
    /**
    * 
    * @param string $to
    */
	public function saveAs($to = 'document.docx') {
		$zip = new ZipArchive();
		$zip->open($to, ZipArchive::CREATE | ZipArchive::OVERWRITE | ZipArchive::CM_STORE );
		$this->putToZip($zip, $this->structure);
		//attach files
		foreach($this->stackAttach as $attach) {
			if($attach->isRemote()) {
				$zip->addFromString(  'word/media/'.$attach->getBaseName(), file_get_contents($attach->target)  );
			} else {
				$zip->addFile( $attach->target, 'word/media/'.$attach->getBaseName()  );
			} 
		} 
		$zip->close();
	}
	
    /**
    * 
    * @param ZipArchive $zip
    * @param type $list
    * @param type $dirContext
    */
	protected function putToZip(ZipArchive $zip, $list, $dirContext = NULL) {
		foreach($list as $key=>$item){
			$dc = !is_null($dirContext) ? $dirContext.'/' : '';
			if(is_array($item)) { 
				$zip->addEmptyDir($dc.$key);
				$this->putToZip($zip, $item, $dc.$key);
			} else {  
				$zip->addFromString($dc.$item->getName(), $item->getContent());
			}
		}				
	}
	
	/**
	* Получить структуру
	* @return array
	*/
	protected function getBaseStructureDocClasses() {		
		return array(
			new ContentTypesStructureDocFile(),
			'_rels'=>array(
				new RelsDirRelsStructureDocFile(),
			),
			'docProps'=>array(
				new DocPropsDirAppStructureDocFile(),
				new DocPropsDirCoreStructureDocFile(),
			),
			'word'=>array(
				'media'=>array(
				),
				$this->getDocument(),
				new WordDirFontTableStructureDocFile(),
				new WordDirSettingsStructureDocFile(),
				$this->getStyle(),
				new WordDirStylesWithEffectsStructureDocFile(),
				new WordDirWebSettingsStructureDocFile(),
				'_rels'=>array(
					$this->getRels(), 
				),
				'theme'=>array( 
					new WordDirThemeDirThemeStructureDocFile(1), 
				),
								
			), 
		);
	}
	
	 
	
	/**
	* 
	*/
	public static function autoLoad() {
		spl_autoload_register(array('VsWord', 'handler'));
	}
	
	/**
	* 
	* @param string $className
	* @return boolean
	*/
	public static function handler($className) {
		if(class_exists($className, FALSE)) {
			return TRUE;
		}
		$patchs = array(
			dirname(__FILE__),
			dirname(__FILE__).DIRECTORY_SEPARATOR.'structure',
			dirname(__FILE__).DIRECTORY_SEPARATOR.'structure'.DIRECTORY_SEPARATOR.'style',
			dirname(__FILE__).DIRECTORY_SEPARATOR.'node',
			dirname(__FILE__).DIRECTORY_SEPARATOR.'parser',
			dirname(__FILE__).DIRECTORY_SEPARATOR.'parser'.DIRECTORY_SEPARATOR.'addeded',
		);
		foreach($patchs as $patch) {
			$file = $patch.DIRECTORY_SEPARATOR.$className.'.php';
			if(file_exists($file)) {
				require_once $file;
				return class_exists($className);
			}
		}
		return FALSE;
	}
	
}