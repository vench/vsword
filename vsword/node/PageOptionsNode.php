<?php

 

/**
 * Description of PageOptionCompositeNode
 * 
 * A simple implementation of the page orientation (a book, an album).
 *
 * @author vench
 */
class PageOptionsNode extends Node {
    
    const ALBUM = 1;
    
    const BOOK = 2;
    
    
    private $typeOrientation;

    /**
     * 
     * @param int $typeOrientation
     */
    public function __construct($typeOrientation) {
         $this->typeOrientation = $typeOrientation;
    }

    /**
     * 
     * @return string
     */
    public function getWord() { 
        if($this->typeOrientation === self::ALBUM) { 
            return '<w:sectPr><w:type w:val="nextPage"/><w:pgSz w:orient="landscape" w:w="16838" w:h="11906"/><w:pgMar w:left="1134" w:right="1134" w:header="0" w:top="1134" w:footer="0" w:bottom="1134" w:gutter="0"/><w:pgNumType w:fmt="decimal"/><w:formProt w:val="false"/><w:textDirection w:val="lrTb"/><w:docGrid w:type="default" w:linePitch="240" w:charSpace="4294961151"/></w:sectPr>';
        }
        return '<w:sectPr><w:type w:val="nextPage"/><w:pgSz w:w="11906" w:h="16838"/><w:pgMar w:left="1134" w:right="1134" w:header="0" w:top="1134" w:footer="0" w:bottom="1134" w:gutter="0"/><w:pgNumType w:fmt="decimal"/><w:formProt w:val="false"/><w:textDirection w:val="lrTb"/><w:docGrid w:type="default" w:linePitch="240" w:charSpace="4294961151"/></w:sectPr>';
    }
}
