<?php

 
/**
 * Class AlignNode
 *
 * @version 1.0.0
 * @author v.raskin
 * @package vsword.node
 */
class AlignNode extends Node implements IPNodeStyle {
    
    /**
     * 
     */
    const TYPE_RIGHT = 'right';
    
    /**
     * 
     */
    const TYPE_LEFT = 'left'; 
    
     /**
     * 
     */
    const TYPE_CENTER = 'center'; 
    
    /**
     * 
     */
    const TYPE_BOTH = 'both';
    
    /**
     *
     * @var string 
     */
    protected  $align;


    /**
     * 
     * @param string $align
     */
    public function __construct($align) {
	$this->align = $align;
    }
    
    public function getWord() {
	return '<w:jc w:val="'.$this->align.'"/>';
    }
}
