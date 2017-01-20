<?php
/**
* Example translates a nested list of HTML in docx
*/

require_once '../vsword/VsWord.php'; 
VsWord::autoLoad();

$doc = new VsWord();  
$parser = new HtmlParser($doc);  

$html = '<div>
<p> <a href="https://ru.wikipedia.org/wiki/%D0%9F%D1%91%D1%82%D1%80_%D0%9F%D0%B5%D1%80%D0%B2%D1%8B%D0%B9_(%D1%80%D0%BE%D0%BC%D0%B0%D0%BD)">Lorem ipsum dolor sit amet,</a>  consectetur adipiscing elit. Aenean diam nibh, scelerisque eu elit at, euismod tempor ligula. Donec eget neque sed velit scelerisque scelerisque at ut ex. Cras tempor mi id efficitur viverra. Proin vitae sem et velit tempor hendrerit. Nam eget augue a turpis cursus venenatis eu a dui. Vivamus et mauris ultrices orci congue egestas. Vivamus vulputate turpis ornare est condimentum, sit amet vehicula urna facilisis. Duis lobortis egestas leo, at bibendum purus efficitur vitae. Praesent lacinia maximus suscipit. Nunc et purus ipsum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam dui erat, molestie ac vulputate quis, viverra non turpis. In volutpat consequat ligula. Suspendisse laoreet eleifend velit, at dictum arcu egestas vel.</p>
<p>Vestibulum placerat suscipit libero eget mollis. Aliquam feugiat faucibus urna ut dapibus. Integer efficitur condimentum odio vitae tristique. Curabitur ornare lectus eget enim ullamcorper tincidunt. Aenean convallis eros convallis augue ullamcorper aliquam. Mauris leo tortor, semper nec augue sed, posuere hendrerit mi. In placerat venenatis velit, sed imperdiet leo commodo ut. Fusce semper massa in sagittis semper. Sed fermentum posuere nulla sit amet commodo. Nam faucibus non magna sit amet congue. Etiam eu laoreet metus. Pellentesque nisl lorem, egestas vitae mi vel, elementum ultricies nibh. Morbi lorem lacus, vehicula sollicitudin viverra a, lobortis quis est. Curabitur sit amet sagittis dui, eget accumsan lacus.</p>  
<ul>
<li>Sed iaculis arcu ut volutpat sodales. Vivamus diam tortor, laoreet sed gravida vel, porttitor non diam. Praesent volutpat posuere neque, a accumsan nibh varius sit amet. Fusce vehicula dignissim lobortis. Mauris semper ac mauris ac commodo. <a href="http://google.com">Pellentesque ultrices mollis massa et hendrerit. </a></li> 	
<li>In porttitor velit quis mattis iaculis. Donec ac cursus leo, sit amet maximus justo. Cras dictum tortor turpis, vel convallis nunc suscipit eu.</li> 
</ul>  
<p>Vestibulum suscipit massa suscipit quam consectetur tempor. Fusce facilisis ut odio eget porta. Praesent non eros accumsan, rhoncus nulla quis, ornare libero. Duis in interdum ante. Aenean eleifend ut dolor in ullamcorper. Sed vestibulum, ex eu maximus posuere, nulla sapien semper tortor, et vestibulum tortor urna in tellus. Sed sed sapien venenatis, gravida mauris sit amet, elementum massa. Mauris ut augue ut dui venenatis malesuada ut ac risus. Duis finibus auctor porta. Donec ut massa dolor. Integer placerat dui in nunc pharetra maximus. Nulla rhoncus ipsum mi, vitae mattis erat scelerisque non. Nulla porttitor gravida dui, ut tempor leo.</p>
</div>
';

$parser->parse($html); 
echo '<pre>'.($doc->getDocument()->getBody()->look()).'</pre>'; 
$doc->saveAs('latin.docx');