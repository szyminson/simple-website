<?php
$names = array();
$urlNames = array();
$active = array();
$count = 0;
$i = 0;
for($i = 0; $i < $pages->count(); $i++){
    
    if($pages->menuVisible($i)){
        $active[$count] = '';
        $names[$count] = $pages->getName($i);
        $urlNames[$count] = $pages->getUrlName($i);
        if($i === $pageId) $active[$count] = ' active';
       
        $count++;

    }

}

$Content = array( "Count" => $count, "Names" => $names, "UrlNames" => $urlNames, "Active" => $active);

?>