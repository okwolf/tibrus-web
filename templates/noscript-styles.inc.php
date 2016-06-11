<?php 
function addNoscriptStyles() {
    echo<<<HTML
	<object>
<noscript>
	<style type="text/css">
		#lyricsContent, #showsContent {
			display: block;
		}
		#player-buttons, #tabNav a.tabs{
			display: none;
		}
	</style>
</noscript>
</object>
HTML;
}
?>
