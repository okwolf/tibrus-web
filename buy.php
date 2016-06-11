<?php 
require 'templates/box.inc.php';
require 'content/stores.inc';
require 'content/songs.inc';
$songId = $_GET['song'];
$songTitle = $songs[$songId];
if (!$songTitle)
    $songTitle = 'Mixed Fuel';
$songTitle = preg_replace('/\([^\)]*\)/', '', $songTitle);
$storeLinks = '';
foreach ($stores as $store=>$URL) {
    if ($URL != NULL) {
        if (is_array($URL)) {
            if (isset($URL['songs'][$songId])) {
                $storeLink = $URL['songs'][$songId];
            } else {
                $storeLink = $URL['album'];
            }
        } else {
            $storeLink = $URL;
        }
        $storeClass = str_replace(array(' ', '.'), '', strtolower($store));
        $storeLinks .= <<<HTML
		<a class="storeLink" title="$store" href="$storeLink">
			<span class="webIcon $storeClass"></span>
			$store
		</a>
HTML;
}
}
echo <<<HTML
<link rel="stylesheet" href="css/tibrus.css" type="text/css" media="screen"/>
<style>
body {
	margin: 0em;
	padding: 0em;
	text-align: center;
	background-image: none;
}
#wrapper {
	margin:auto;
	width:400px;
}
h2 {
	text-align:left;
	margin:0 auto 20px auto;
	letter-spacing:-1px;
	font-size:16pt;
}
#webIcons {
	width: 12em;
	margin: 28px auto 0em auto;
}
#webIcons a.storeLink {
	display: block;
	font-size:14pt;
	text-decoration: none;
	text-align: left;
}
#webIcons a.storeLink:hover {
	/* background-color: #8E644E; */
	text-decoration: underline;
	color: Black;
}
#webIcons span.webIcon {
	float: left;
	position: relative;
	margin: 2px 8px 2px 0px;
    opacity: 1;
	filter: alpha( opacity = 100);
}
</style>
<div id="wrapper">
HTML;
$buyBoxContent = <<<HTML
<h2><i>$songTitle</i> by <a href="index.php">Tibrus</a> is available for purchase at the following fine stores:</h2>
<div id="webIcons">
    $storeLinks
</div>
<br style="clear:both"/>
HTML;
addBox('Buy '.$songTitle, $buyBoxContent, true);
echo<<<HTML
</div> 
HTML;
?>
