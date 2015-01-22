<?php

interface INode {
	function getWord();
	function getHtml();
	function setParent($parent);
	function getParent();
}

interface INodeStyle extends INode{ }

interface INodeStyleAdded extends INode{ }

interface IPNodeStyle extends INode{ }
interface IPNodeStyleAdded extends INode{ 
    function addPNodeStyle(IPNodeStyle $node);
}

interface INodeTextAdded {
	function addText($string);
}

interface ILineContext {}

interface IBlockContext {}

interface IInitNode {
	/**
	* @param string $tagName
	* @param mixed $attributes
	* @return Node
	*/
	function initNode($tagName, $attributes);
} 