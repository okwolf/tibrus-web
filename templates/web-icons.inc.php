<?php 
require 'content/stores.inc';
function addWebIcons() {
	global $stores;
    echo '<div id="webIcons"><div class="iconBar">';
    addIconLink('http://www.myspace.com/tibrusmusic', 'MySpace');
    addIconLink('http://www.ilike.com/artist/Tibrus', 'iLike');
    addIconLink('http://www.facebook.com/pages/Tibrus/163950569917', 'Facebook');
	addIconLink('http://www.twitter.com/tibrus', 'Twitter');
    addIconLink('http://www.last.fm/music/Tibrus', 'Last.fm');
	addIconLink('http://www.bebo.com/tibrus', 'Bebo');
	addIconLink('http://www.reverbnation.com/tibrus', 'ReverbNation');
	addIconLink('http://www.imeem.com/tibrus', 'imeem');
    addIconLink(NULL, 'Pandora');
    echo '</div><br /><div class="iconBar">';
	foreach ($stores as $store=>$URL)
        addIconLink($URL, $store);
    echo '</div></div>';
}
?>
