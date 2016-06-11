<?php 
function addPlaylist($content) {
    require $content;
    $contentHTML = addPlaylistSongs();
    echo<<<HTML
<div id="player-controls">
	<div id="player-buttons">
		<div class="player-button" id="player-prev">Previous</div>
		<div class="player-button" id="player-play">Play/Pause</div>
		<div class="player-button" id="player-next">Next</div>
		<div class="player-button" id="player-mute">Mute</div>
		<div id="volume">
			<div class="marker"></div>
			<div class="slider">
				<div class="knob"></div>
			</div>
		</div>
	</div>
</div>
<ul id="player" class="playlist shiny">
    $contentHTML
</ul>
<div id="playing">
</div>
<div id="control-template">
    <div class="controls">
        <div class="statusbar">
            <div class="loading">
            </div>
            <div class="position">
            </div>
        </div>
    </div>
    <div class="timing">
        <div id="sm2_timing" class="timing-data">
            <span class="sm2_position">%s1</span>
            / <span class="sm2_total">%s2</span>
        </div>
    </div>
    <div class="peak">
        <div class="peak-box">
            <span class="l"></span>
            <span class="r"></span>
        </div>
    </div>
</div>
<div id="spectrum-container" class="spectrum-container">
    <div class="spectrum-box">
        <div class="spectrum">
        </div>
    </div>
</div>
HTML;
}
?>
