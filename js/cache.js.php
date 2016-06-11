<?php 
$javascripts = array('mootools.js', 'soundmanager2-nodebug-jsmin.js', 'tibrus.js', 'page-player.js', 'iepngfix_tilebg.js', 'MenuMatic_0.68.3.js', 'slimbox.js');
$lastModified = 0;
foreach ($javascripts as $filename) {
    $filename = dirname(__FILE__).'/'.$filename;
    $fileModified = filemtime($filename);
    if ($fileModified > $lastModified)
        $lastModified = $fileModified;
}
?>