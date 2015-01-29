<?php 

/**
*  Class Node
* 
*  @version 1.0.1
*  @author v.raskin
*/
abstract class Node implements INode {
	
	/**
	 *
	 * @var array 
	 */
	protected $attributes = array();
	
	/**
	* @var Node
	*/
	protected $parent;
	
	/**
	* Id style
	* @var string
	*/
	protected $styleId;
	
	/**
	 * 
	 * @return CompositeNode
	 */
	public function getParent() {
		return $this->parent;
	}
	
	public function getName() {
		return get_class($this);
	}
	
	public function setStyleID($styleId) {
		$this->styleId = $styleId;
	}
	
	/**
	 * 
	 * @param Style $style
	 */
	public function setStyle(Style $style) {
		$this->setStyleID($style->getStyleId());
	}
	
	/**
	 * 
	 * @param CompositeNode $parent
	 */
	public function setParent( $parent) {
		$this->parent = $parent;
	}
	
	public function addAttribute($key, $value) {
		$this->attributes[$key] = $value; 
	}
	
	public function addAttributes($attributes) {
		foreach($attributes as $key=>$value) {
			$this->addAttribute($key, $value);
		}
	}
	
	public function getAttributes() {
		return $this->attributes;
	}
	
	public function getAttribute($key) {
		return isset($this->attributes[$key]) ? $this->attributes[$key] : NULL; 
	}
	
	/**
	 * 
	 * @return string
	 */
	public function attributeToString() {
		$attr = array();
		foreach($this->attributes as $key=>$value){
			$attr[] = $key.'="'.$value.'"'; 
		}
		return ' '.join(' ', $attr);
	}
	
	/**
	 * 
	 * @throws Exception
	 */
	public function getWord() {
		throw new Exception('No implementation');
	}
	
	/**
	 * 
	 * @throws Exception
	 */
	public function getHtml() {
		throw new Exception('No implementation');
	}
	
	/**
	* This method view tree nodes
	* @return string
	*/
	public function look($tab = '') {
		return $tab.($this)."\n";
	}
	
	public function __toString() {
		return get_class($this);
	}
}

