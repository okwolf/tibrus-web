<?php 
function addPlaylistSongs() {
    require ('songs.inc');
    $html = '';
    foreach ($songs as $songId=>$title)
        $html .= addPlaylistSong($songId, $title);
    return $html;
}
?>
