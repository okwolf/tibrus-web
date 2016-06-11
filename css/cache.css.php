<?php 
$lastModified = 0;
foreach (glob(dirname(__FILE__).'/*.css') as $filename) {
    $fileModified = filemtime($filename);
    if ($fileModified > $lastModified)
        $lastModified = $fileModified;
}
?>
