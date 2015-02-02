<?php 

/**
*  Class Node base node class.
* 
*  @version 1.0.1
*  @author v.raskin
 * @package vsword.node
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
	
	/**
	 * 
	 * @return string
	 */
	public function getName() {
		return get_class($this);
	}
	
	/**
	 * 
	 * @param string $styleId
	 */
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
	
	/**
	 * 
	 * @param string $key
	 * @param string $value
	 */
	public function addAttribute($key, $value) {
		$this->attributes[$key] = $value; 
	}
	
	/**
	 * 
	 * @param array $attributes
	 */
	public function addAttributes($attributes) {
		foreach($attributes as $key=>$value) {
			$this->addAttribute($key, $value);
		}
	}
	
	/**
	 * 
	 * @return array list attributes node
	 */
	public function getAttributes() {
		return $this->attributes;
	}
	
	/**
	 * 
	 * @param string $key
	 * @return string
	 */
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
	
	/**
	 * 
	 * @return string
	 */
	public function __toString() {
		return get_class($this);
	}
}

