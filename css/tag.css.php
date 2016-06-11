<?php 
require 'cache.css.php';
if (file_exists(dirname(__FILE__).'/../../mode.prod')) {
    echo<<<HTML
<link rel="stylesheet" href="css/all.css.php?$lastModified" type="text/css" media="screen"/>

HTML;
}
else {
    foreach (glob("css/*.css") as $filename) {
        if ($filename != 'css/cache.css') {
            echo<<<HTML
<link rel="stylesheet" href="$filename" type="text/css" media="screen"/>

HTML;
}
}
}
?>
