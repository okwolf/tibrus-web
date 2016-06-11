<?php 
define('__CACHE_FILE', 'cache.css');
require 'cssmin.php';
header('Expires: Fri, 1 Jan 2038 00:00:00 GMT');
header('Content-type: text/css');
require 'cache.css.php';
if (!file_exists(__CACHE_FILE) || filemtime(__CACHE_FILE) < $lastModified) {
    $fout = fopen(__CACHE_FILE, 'w');
    foreach (glob("*.css") as $i=>$filename) {
        if ($filename != __CACHE_FILE) {
            if ($i > 0)
                fwrite($fout, "\n\n");
			$file_contents = file_get_contents($filename);
			$file_contents = str_replace('url(../', 'url(http://cdn.tibrus.com/', $file_contents);
            fwrite($fout, "/*** $filename ***/\n");
            fwrite($fout, css_strip_whitespace($file_contents));
        }
    }
    fclose($fout);
}
require __CACHE_FILE;
?>
