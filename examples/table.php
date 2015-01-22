<?php

/**
* A simple example or creating a document with a table.
* In the table cell in inserted plain text, list and image. 
*/

require_once '../vsword/VsWord.php'; 
VsWord::autoLoad();

$doc = new VsWord();
$body = $doc->getDocument()->getBody();

$table = new TableCompositeNode();
$body->addNode($table);
$style = new TableStyle(1); 
$table->setStyle($style);
$doc->getStyle()->addStyle($style);

//add row
$tr = new TableRowCompositeNode();
$table->addNode($tr); 
//add cols
$col = new TableColCompositeNode(); 
$col->addText("Large text... Large text...Large text...Large text...Large text...Large text...Large text...");
$col->getLastPCompositeNode()->addNode( new BrNode() );
$tr->addNode($col);

$col = new TableColCompositeNode(); 
$col->addText("Large text... Large text...Large text...Large text...Large text...Large text...Large text...");
$col->getLastPCompositeNode()->addNode( new BrNode() );
$tr->addNode($col);
//add row
$tr = new TableRowCompositeNode();
$table->addNode($tr); 

$col = new TableColCompositeNode();  
$tr->addNode($col);

$list = new ListCompositeNode();  
$col->addNode($list);
$col->getLastPCompositeNode()->addNode( new BrNode() );

for($i = 1; $i <= 10; $i ++) {
	$item = new ListItemCompositeNode();
	$item->addText("List item $i");
	$list->addNode( $item );
} 

//add image in col
$attach = $doc->getAttachImage(dirname(__FILE__).DIRECTORY_SEPARATOR.'img1.jpg');
$drawingNode = new DrawingNode();
$drawingNode->addImage($attach);

$col = new TableColCompositeNode();  
$tr->addNode($col);  
$col->getLastPCompositeNode()->addNode( $drawingNode );


$doc->saveAs('./table.docx');
