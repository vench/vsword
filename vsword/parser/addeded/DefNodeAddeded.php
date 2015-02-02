<?php

/**
*  Class DefNodeAddeded default rule for adding tags.
* 
*  @version 1.0.0
*  @author v.raskin
 * @package vsword.parser.addesed
*/ 
class DefNodeAddeded extends NodeAddeded {
    
    protected function addNode($node, $target) {
		$target->addNode($node);
		return true;
    } 
}