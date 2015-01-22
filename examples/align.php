<?php

/* 
 * Example text alignment.
 */

require_once '../vsword/VsWord.php'; 
VsWord::autoLoad();

$doc = new VsWord();   

$paragraph = new PCompositeNode(); 
$paragraph->addPNodeStyle( new AlignNode(AlignNode::TYPE_RIGHT) );
$paragraph->addText("Some more text ... More text about... Some more text ... More text about... Some more text ... More text about...");
$doc->getDocument()->getBody()->addNode( $paragraph );

$paragraph = new PCompositeNode(); 
$paragraph->addPNodeStyle( new AlignNode(AlignNode::TYPE_LEFT) );
$paragraph->addText("Some more text ... More text about... Some more text ... More text about... Some more text ... More text about...");
$doc->getDocument()->getBody()->addNode( $paragraph );

$paragraph = new PCompositeNode(); 
$paragraph->addPNodeStyle( new AlignNode(AlignNode::TYPE_CENTER) );
$paragraph->addText("Some more text ... More text about... Some more text ... More text about... Some more text ... More text about...");
$doc->getDocument()->getBody()->addNode( $paragraph );

$paragraph = new PCompositeNode(); 
$paragraph->addPNodeStyle( new AlignNode(AlignNode::TYPE_BOTH) );
$paragraph->addText("Some more text ... More text about... Some more text ... More text about... Some more text ... More text about...");
$doc->getDocument()->getBody()->addNode( $paragraph );
/**/
echo '<pre>'.($doc->getDocument()->getBody()->look()).'</pre>';

$doc->saveAs('align.docx');