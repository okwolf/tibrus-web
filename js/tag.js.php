<?php 
require 'cache.js.php';
if (file_exists(dirname(__FILE__).'/../../mode.prod')) {
    echo<<<HTML
<script src="js/all.js.php?$lastModified" type="text/javascript"></script>
<script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>
HTML;
}
else {
    foreach ($javascripts as $filename) {
        echo<<<HTML
<script src="js/$filename" type="text/javascript"></script>

HTML;
}
}
?>