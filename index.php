<?php 
define('__CACHE_FILE', 'content/index.cache');
header('Expires: Tue, 1 Jan 1980 00:00:00 GMT');
header('Content-type: text/html');
$lastModified = 0;
foreach (glob('*/*') as $filename) {
    $fileModified = @filemtime($filename);
    if ($fileModified > $lastModified)
        $lastModified = $fileModified;
}
if (@filemtime(__CACHE_FILE) < $lastModified) {
    $fout = fopen(__CACHE_FILE, 'w');
    ob_start();
    require 'content/index.inc';
    fwrite($fout, ob_get_contents());
    fclose($fout);
    ob_end_clean();
}
readfile(__CACHE_FILE);
?>