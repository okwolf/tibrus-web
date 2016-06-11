<?php 
function addIconLink($URL, $name) {
    $storeClass = str_replace(array(' ', '.'), '', strtolower($name));
    if (!$URL) {
        $name .= ' (Coming Soon)';
		echo<<<HTML
		<span class="webIcon $storeClass" title="$name">$name</span>
HTML;
    } else {
    	$actualURL = $URL;
    	if(is_array($URL)) $actualURL = $URL['album'];
        echo<<<HTML
		<a href="$actualURL" class="webIcon $storeClass" title="$name">$name</a>
HTML;
    }
}
?>
