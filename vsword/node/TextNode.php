<?php

/**
*  Class TextNode
* 
*  @version 1.0.1
*  @author v.raskin
 * @package vsword.node
*/
class TextNode extends Node implements INodeTextAdded, ILineContext {
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
		return '<w:t>'.$this->getText().'</w:t>';
	}
	
	 
}