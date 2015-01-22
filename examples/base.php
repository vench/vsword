<?php
/**
* A simple example of creating a document.
* In the document added header and added two paragraphs. 
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

$paragraph = new PCompositeNode();
$rParagraph= new RCompositeNode();
$paragraph->addNode($rParagraph);  
$rParagraph->addTextStyle(new FontSizeStyleNode(14));
$rParagraph->addText("Some more text ... More text about... Some more text ... More text about... Some more text ... More text about...");
$body->addNode( $paragraph );

$paragraph2 = new PCompositeNode();
$rParagraph2 = new RCompositeNode();
$paragraph2->addNode($rParagraph2);  
$rParagraph2->addTextStyle(new FontSizeStyleNode(14));
$rParagraph2->addText("Some more text ... More text about... Some more text ... More text about... Some more text ... More text about...");
 

$rParagraph3 = new RCompositeNode();
$paragraph2->addNode($rParagraph3);
$rParagraph3->addTextStyle(new FontSizeStyleNode(11));
$rParagraph3->addTextStyle(new ItalicStyleNode());
$rParagraph3->addText('Italic text');

$body->addNode( $paragraph2 );
 

$doc->saveAs('./base.docx');