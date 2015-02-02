<?php

/**
 * Interface INode 
 * @version 1.0.1
 * @author v.raskin
 * @package vsword
 */
interface INode {
	function getWord();
	function getHtml();
	function setParent($parent);
	function getParent();
}

/**
 * Interface INodeStyle 
 * @version 1.0.1
 * @author v.raskin
 * @package vsword
 */
interface INodeStyle extends INode{ }

/**
 * Interface INodeStyleAdded 
 * @version 1.0.1
 * @author v.raskin
 * @package vsword
 */
interface INodeStyleAdded extends INode{ }

/**
 * Interface IPNodeStyle 
 * @version 1.0.1
 * @author v.raskin
 * @package vsword
 */
interface IPNodeStyle extends INode{ }

/**
 * Interface IPNodeStyleAdded 
 * @version 1.0.1
 * @author v.raskin
 * @package vsword
 */
interface IPNodeStyleAdded extends INode{ 
    function addPNodeStyle(IPNodeStyle $node);
}

/**
 * Interface INodeTextAdded.
 * Allows to set the text in the node. 
 * @version 1.0.1
 * @author v.raskin
 * @package vsword
 */
interface INodeTextAdded {
	/**
	 * @param string  $string
	 */
	function addText($string);
}

/**
 * Interface ILineContext 
 * @version 1.0.1
 * @author v.raskin
 * @package vsword
 */
interface ILineContext {}

/**
 * Interface IBlockContext 
 * @version 1.0.1
 * @author v.raskin
 * @package vsword
 */
interface IBlockContext {}

/**
 * Interface IInitNode 
 * @version 1.0.1
 * @author v.raskin
 * @package vsword
 */
interface IInitNode {
	/**
	* @param string $tagName
	* @param mixed $attributes
	* @return Node
	*/
	function initNode($tagName, $attributes);
} 