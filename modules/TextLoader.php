<?php

$content = file_get_contents($_ENV['TEXT_LOADER'].'/'.$pages->getUrlName($pageId).'.txt');

//echo $blade->run("modules.textLoader",array("text"=>$text));

?>