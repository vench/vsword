<?php
/**
* The example creates a table from an array
*/

require_once '../vsword/VsWord.php'; 
VsWord::autoLoad();

$data = array(
	array(
		"Name"=>"A. Pushkin",
		"Age"=>"31",
		"Phone"=>"none",
		"Address"=>"SPb, pr. Moyki 17",
		"Mail"=>"none",
	),
	array(
		"Name"=>"M. Ivanov",
		"Age"=>"54",
		"Phone"=>"521-8798",
		"Address"=>"Moskov, pr. Lenina 56",
		"Mail"=>"m.ivanov@info.com",
	),
	array(
		"Name"=>"M. Chernova",
		"Age"=>"23",
		"Phone"=>"+7-911-7865421",
		"Address"=>"Penza, pr. Lenina 12",
		"Mail"=>"none",
	),
	array(
		"Name"=>"V. Ut",
		"Age"=>"34",
		"Phone"=>"none",
		"Address"=>"SPb, pr. Lenina 12",
		"Mail"=>"none",
	),
);



$doc = new VsWord();
$body = $doc->getDocument()->getBody();

$table = new TableCompositeNode();
$body->addNode($table);
$style = new TableStyle(1); 
$table->setStyle($style);
$doc->getStyle()->addStyle($style);

$first = TRUE;
foreach($data as $item) {

	if($first) {//add header
		$tr = new TableRowCompositeNode();
		$table->addNode($tr); 
		foreach($item as $key=>$value) {
			$col = new TableColCompositeNode(); 
			$tr->addNode($col);
			 
			$rTitle = new RCompositeNode();
			$col->getLastPCompositeNode()->addNode($rTitle); 
			$rTitle->addTextStyle(new BoldStyleNode());
			$rTitle->addTextStyle(new FontSizeStyleNode(18));
			$rTitle->addText($key);
			
		}
		$first = false;
	}

	$tr = new TableRowCompositeNode();
	$table->addNode($tr); 
	foreach($item as $key=>$value) {
	
		if($key == "Mail"){
			$col = new TableColCompositeNode();
			$tr->addNode($col); 
			$link = new HyperlinkCompositeNode(); 
			$rLink = new RCompositeNode();
			$rLink->addText($value);
			$link->addNode($rLink);
			$col->getLastPCompositeNode()->addNode( $link );
			$col->getLastPCompositeNode()->addNode( new BrNode() );
		} else {
			$col = new TableColCompositeNode(); 
			$col->addText($value);
			$col->getLastPCompositeNode()->addNode( new BrNode() );
			$tr->addNode($col);
		}
	}
}

echo '<pre>'.($doc->getDocument()->getBody()->look()).'</pre>';

$doc->saveAs('./table2.docx');
