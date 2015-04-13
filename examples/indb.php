<?php
/*
*
*/
header("Content-Type: text/html; charset=utf-8");
require_once '../vsword/VsWord.php'; 
VsWord::autoLoad();

$db = new PDO('sqlsrv:server=192.168.1.232;Database=ETB', 'staffdb', 'staff_dep', array());
if(!$db) {
	throw new Exception("Error connect to BD!");
}
$sth = $db->prepare('SELECT 
	   q.id
      ,q.lev_q
      ,q.question
      ,q.time
	  ,c.kategoriya
	  ,qc.id_kat
  FROM que as q
  LEFT JOIN quekat as qc ON (qc.id_que = q.id)
  LEFT JOIN kat_time as c ON (c.id = qc.id_kat)
  ORDER BY  c.kategoriya
  '); 
$sth->execute();
$questions = $sth->fetchAll(PDO::FETCH_ASSOC); 

//var_dump($questions);

$sth = $db->prepare('SELECT id
      ,id_que
      ,answer
      ,r_r
  FROM ans'); 
$sth->execute();
$answers = $sth->fetchAll(PDO::FETCH_ASSOC); 
//var_dump($answers);

$doc = new VsWord(); 
$body = $doc->getDocument()->getBody();

class FactoeyNodes {
	
	static public function   getHeadNode() {
		$p = new PCompositeNode();
		$r = new RCompositeNode();
		$p->addNode($r); 
		$r->addTextStyle(new BoldStyleNode());
		$r->addTextStyle(new FontSizeStyleNode(24));
		$p->addPNodeStyle( new AlignNode(AlignNode::TYPE_CENTER) );
		return $p;
	}

	static public function   getQuestNode() { 
		$p = new PCompositeNode();
		$r = new RCompositeNode();
		$p->addNode($r); 
		$r->addTextStyle(new BoldStyleNode());
		$r->addTextStyle(new FontSizeStyleNode(16));
		return $p;
	}
	
	static public function   getAnswerNode($right = FALSE) { 
		$item = new PCompositeNode();
		$r = new RCompositeNode();
		$item->addNode($r);
		$r->addTextStyle(new FontSizeStyleNode(14));
		if($right) { 
			$r->addTextStyle(new BoldStyleNode());  
			$r->addTextStyle(new ColorStyleNode('336699'));
			 
		}
		return $item;
	}	
}

$category = -1;
$counter = 0;
foreach($questions as $k=>$question) {
	if($category != $question['id_kat']) {
		$category = $question['id_kat'];
		$counter = 0;
		if($k > 0) {
			$body->addNode(new PageBreakNode());
		}
		$head = FactoeyNodes::getHeadNode();
		$text = ($category > 0) ? "Категория ".$question['kategoriya']."." : "Без категории.";
		$head->addText($text);
		$body->addNode($head);
	}
	$paragraph = FactoeyNodes::getQuestNode(); 
	$paragraph->addText((++$counter).'. '.$question['question']);
	$body->addNode($paragraph);
	
 
	$listCount = 0;
	foreach($answers as $answer) {
		if($answer['id_que'] == $question['id']) { 
			$item = FactoeyNodes::getAnswerNode($answer['r_r'] == 1);  
			$item->addText(( ++ $listCount).'. '.$answer['answer']);
			$body->addNode( $item ); 
		}
	}
}
 

$doc->saveAs('el-test.docx');
echo 'OK';