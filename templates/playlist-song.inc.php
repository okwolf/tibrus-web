<?php 
require 'content/stores.inc';
define('__SAMPLE_SONG_EXTENSION', '-edit.m4a');
define('__FULL_SONG_EXTENSION', '.m4a');
function addPlaylistSong($songId, $title) {
    global $stores;
    $sampleIndicator = '';
    $sampleFile = 'samples/'.$songId.__FULL_SONG_EXTENSION;
    if (!file_exists($sampleFile)) {
        $sampleIndicator = ' <img class="sample-indicator" src="images/sample_song_icon.png" alt="(partial sample)" /><span class="sample-indicator">(partial sample)</span>';
        $sampleFile = 'samples/'.$songId.__SAMPLE_SONG_EXTENSION;
    }
    $storeLinks = '';
    foreach ($stores as $store=>$URL) {
        if ($URL != NULL) {
            if (is_array($URL)) {
                $storeLink = $URL['songs'][$songId];
            } else {
                $storeLink = $URL;
            }
            $storeLinks .= '<a class="storeLink" href="'.$storeLink.'">'.$store.'</a>
			';
        }
    }
    return <<<HTML
<li id="$songId" class="playlistSong">
	<ul><li><p></p><span></span></li></ul> 
    <a href="$sampleFile">$title$sampleIndicator</a>
	<ul id="$songId-menu" class="songMenu">
		<li>
			<a href="#$songId-lyrics" class="songLyricsLink songLink">Lyrics</a>
		</li>
		<li>
			<a href="buy.php?song=$songId" class="songBuyLink songLink">Buy</a>
			<ul>
				<li>
					$storeLinks
				</li>
			</ul>
		</li>
	</ul>
</li>
HTML;
}
?>
