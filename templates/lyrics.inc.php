<?php 
function addLyrics() {
    echo <<<HTML
	<div id="lyricsContent" class="tabPane">
        <div class="grid_6">
HTML;
addLyricsBox('Mixed Fuel', 'mixed_fuel');
addLyricsBox('Burn', 'burn');
addLyricsBox('Driving', 'driving');
addLyricsBox('Politics 666', 'politics_666');
addLyricsBox('Love Me Computer', 'love_me_computer');
addLyricsBox('I Died for You Twice', 'i_died_for_you_twice');
addLyricsBox("I'm Not Over You", 'im_not_over_you');
echo <<<HTML
        </div>
		<div class="grid_6">
HTML;
addLyricsBox('Fusion Locomotion', 'fusion_locomotion');
addLyricsBox('Fr&aring;ga', 'fraga');
addLyricsBox('SOAD Blows', 'soad_blows');
addLyricsBox('Nur Im Traum', 'nur_im_traum');
addLyricsBox('Not Dead Yet', 'not_dead_yet');
addLyricsBox('Take Me Away', 'take_me_away');
addLyricsBox('Fake People', 'fake_people');
echo<<<HTML
        </div>
    </div>
HTML;
}
?>
