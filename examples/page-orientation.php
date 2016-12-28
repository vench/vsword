<?php

/* 
 * Page  Orientation
 */

require_once '../vsword/VsWord.php'; 
VsWord::autoLoad();

$doc = new VsWord();
$body = $doc->getDocument()->getBody();

$body->addText('Some test1 ALBUM');
$body->setPageOption(PageOptionsNode::ALBUM);

$body->addText('Some test2 BOOK');
$body->setPageOption(PageOptionsNode::BOOK);

$body->addText('Some test3 ALBUM');
$body->setPageOption(PageOptionsNode::ALBUM);


$doc->saveAs('./page-or.docx');