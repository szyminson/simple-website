<?php

$parsedown->setSafeMode(true);
$parsed = $parsedown->text(file_get_contents($_ENV['TEXT_LOADER'].'/'.$pages->getUrlName($pageId).'.md'));

$Content = array("Text" => $parsed);

?>