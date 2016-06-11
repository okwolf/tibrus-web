<?php 
define('__SAMPLE_SONG_EXTENSION', '-edit.m4a');
define('__FULL_SONG_EXTENSION', '.m4a');
function addLyricsBox($title, $id) {
    $sampleIndicator = 'Song';
    $sampleFile = 'samples/'.$id.__FULL_SONG_EXTENSION;
    if (!file_exists($sampleFile)) {
        $sampleIndicator = 'Sample';
        $sampleFile = 'samples/'.$id.__SAMPLE_SONG_EXTENSION;
    }
    $contentHTML = file_get_contents("content/lyrics/$id.inc");
    $creditsPath = "content/credits/$id.inc";
    if (file_exists($creditsPath)) {
        $creditsHTML = '<em>'.file_get_contents($creditsPath).'</em><br/><br/>';
    }
    echo<<<HTML
<a name="$id-lyrics"></a>
<div id="$id-lyrics" class="box lyricsBox">
    <h3 class="boxHeader">
        <span class="boxHeaderContent">
            $title
        </span>
    </h3>
    <div class="boxContent">
		<a href="$sampleFile" class="playSong samplePaused exclude">
			<span class="play-button"></span>
			<span class="playText">Play</span>
			<span class="pauseText">Pause</span>
			$sampleIndicator
		</a>
		$creditsHTML
        $contentHTML
    </div>
    <div class="boxFooter"></div>
</div>
HTML;
}
?>
