<?php

/**
*  Class NodeAddeded encapsulates the rules for adding tags.
* 
*  @version 1.0.4
*  @author v.raskin
 * @package vsword.parser.addesed
*/
abstract class NodeAddeded {
    
    /**
     *
     * @var Node 
     */
    private  $node;

    /**
     *
     * @var Node 
     */
    private $target;
    
    /**
     *
     * @var Node 
     */
    private $newNode;
    
    /**
     *
     * @var Node 
     */
    private $newTarget;
	
	/**
	* @var Parser
	*/
	private $parser;

    /**
     * 
     * @param Node $node
     * @param Node $target
     */
    final public function __construct(Node $node, Node $target, Parser $parser) {
		$this->node = $node;
		$this->target = $target;
		$this->newNode = $node;
		$this->parser = $parser;
		$this->newTarget = $target;
    }
    
    /**
     * 
     * @param Node $node
     * @param Node $target
     * @return NodeAddeded
     */
    public static function init(Node $node, Node $target, Parser $parser) { 
		$addeded = NULL; 
		try {
			$ref = new ReflectionClass(get_class($node).'NodeAddeded');
			$addeded = $ref->newInstance($node, $target, $parser);
		} catch(ReflectionException $exp) {  
			$addeded =  new DefNodeAddeded($node, $target, $parser);
		} 
		$addeded->tryAdd(); 
		return $addeded;
    } 
	
	/**
	* @return Parser
	*/
	final public function  getParser() {
		return $this->parser;
	} 
    
    /**
     * 
     * @return Node
     */
    final public function getNode() {
		return $this->node;
    }
    
    /**
     * 
     * @return Node
     */
    final public function getTarget() {
		return $this->target;
    }
    
    /**
     * 
     * @return Node
     */
    final public function getNewNode() {
		return $this->newNode;
    }
    
    /**
     * 
     * @param Node $newNode
     */
    final public function setNewNode($newNode) {
		$this->newNode = $newNode;
    }
    
    /**
     * 
     * @return Node
     */
    final public function getNewTarget() {
		return $this->newTarget;
    }
    
    /**
     * 
     * @param Node $newTarget
     */
    final public function setNewTarget($newTarget) {
		$this->newTarget = $newTarget;
    }

    /**
     * 
     * @return void
     * @throws Exception
     */
    final public function tryAdd() {
		$target = $this->target;
		do{
		    if($this->addNode($this->getNode(), $target)) {
				return;
		    }
		} while(!is_null($target = $target->getParent()));
		throw new Exception('The node "'.get_class($this->getNode()).'" can not be added to "'.get_class($this->target).'"');
    }

    /**
     * @return boolean True if node was been added
     */
    abstract protected function addNode($node, $target);
    
    /**
     * 
     * @param string $name HTML node name
     * @return type
     */
    protected function initNode($name) {
		return $this->parser->initNode($name);
    }
}