<?php
/**
* Example translates the text into a document *.docx from the editor tinymce.
*/

header("Content-Type: text/html; charset=utf-8");

if(isset($_POST['text'])) {
	require_once '../vsword/VsWord.php'; 
	VsWord::autoLoad();
	
	$doc = new VsWord();  
	$parser = new HtmlParser($doc);  
	$html = ($_POST['text']);  
	$parser->parse($html);   
	 
	echo '<pre>'.($doc->getDocument()->getBody()->look()).'</pre>';
	$doc->saveAs('tinymce.docx'); 
	exit();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Simple theme example</title>

<!-- TinyMCE -->
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script> 
<!-- /TinyMCE -->

</head>
<body>

<form method="post" action="tinymce.php">
	<h3>Simple with tinymce</h3>

 
 
	<textarea id="elm1" name="text" rows="15" cols="80" style="width: 80%">
		&lt;p&gt;
			Enter here text...
		&lt;/p&gt;
	 
	</textarea>

	<br />
	<input type="submit" name="save" value="Submit" />
	<input type="reset" name="reset" value="Reset" />
</form>
 
</body>
</html>
