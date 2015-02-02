<?php



/**
 * Class StringNode
 * 
 * @version 1.0.2
 * @author v.raskin
 * @package vsword.node
 */
class StringNode extends Node implements INodeTextAdded {
	
	protected $text;
	
        
	public function __construct($text = '') {
		$this->addText($text);  
	}
	
	/**
	 * 
	 * @param string $text
	 */
	public function setText($text) {
		$this->text = $text;
	}
	
	/**
	* @param string
	* @return INode
	*/
	public function addText($text) {
		$this->setText($this->text.$text); 
		return $this;
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getText() {
		return $this->text;
	}
	
	public function getWord() {
		return $this->getText();
	}
	
	public function getHTML() {
		return $this->getText();
	}
}
