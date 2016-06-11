<?php 
define('__CACHE_FILE', 'cache.js');
require 'jsmin.php';
header('Expires: Fri, 1 Jan 2038 00:00:00 GMT');
header('Content-type: application/javascript');
require 'cache.js.php';
if (!file_exists(__CACHE_FILE) || filemtime(__CACHE_FILE) < $lastModified) {
    $fout = fopen(__CACHE_FILE, 'w');
    foreach ($javascripts as $i=>$filename) {
        if ($filename != __CACHE_FILE) {
            if ($i > 0)
                fwrite($fout, "\n\n");
            fwrite($fout, "/*** $filename ***/");
            fwrite($fout, JSMin::minify(file_get_contents($filename)));
        }
    }
    fclose($fout);
}
require __CACHE_FILE;
?>
