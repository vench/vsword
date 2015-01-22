<?php
/**
* A simple example of creating document with a page break. 
*/
require_once '../vsword/VsWord.php'; 
VsWord::autoLoad();

$doc = new VsWord();
$body = $doc->getDocument()->getBody();

$title = new PCompositeNode();
$rTitle = new RCompositeNode();
$title->addNode($rTitle); 
$rTitle->addTextStyle(new BoldStyleNode());
$rTitle->addTextStyle(new FontSizeStyleNode(36));
$rTitle->addText("Header 1");
$body->addNode( $title );

$body->addNode(new PageBreakNode());

$title = new PCompositeNode();
$rTitle = new RCompositeNode();
$title->addNode($rTitle); 
$rTitle->addTextStyle(new BoldStyleNode());
$rTitle->addTextStyle(new FontSizeStyleNode(36));
$rTitle->addText("Header 2");
$body->addNode( $title );


$doc->saveAs('./pagebreak.docx');