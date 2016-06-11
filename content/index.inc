<?php require 'templates/all.inc.php'; ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <meta name="description" content="Excellent Rock &amp; Roll from Washington DC" />
        <meta name="keywords" content="Tibrus, band, music, Washington DC, rock, rock and roll, metal, wolfgang, coffey, wedemeyer, david, mixed fuel, burn, driving, politics 666, Love Me Computer, I Died for You Twice, I'm Not Over You, Fusion Locomotion, Fråga, fraga, SOAD Blows, Nur Im Traum, Not Dead Yet, Take Me Away, Fake People"/>
        <title>Tibrus</title>
        <?php require 'css/tag.css.php'; ?>
        <?php addIEStyles(); ?>
    </head>
    <body>
        <div id="all" class="container_12">
            <br/>
            <div class="grid_5">
                <div id="bandPhoto">
                    <a href="images/band_photo_01.jpg" rel="lightbox-bandPhoto"><img src="images/band_photo.jpg" alt="Photo 1 of Tibrus" /></a>
                </div>
                <div id="bandPhotoThumbContainer">
                    <a href="images/band_photo_02.jpg" class="bandPhotoThumb" id="thumb2" rel="lightbox-bandPhoto">Photo 2 of Tibrus</a>
                    <a href="images/band_photo_03.jpg" class="bandPhotoThumb" id="thumb3" rel="lightbox-bandPhoto">Photo 3 of Tibrus</a>
                    <a href="images/band_photo_04.jpg" class="bandPhotoThumb" id="thumb4" rel="lightbox-bandPhoto">Photo 4 of Tibrus</a>
                </div>
                <?php addWebIcons(); ?>
            </div>
            <div class="grid_7" id="player-container">
                <?php addPlaylist('content/playlist.inc'); ?>
            </div>
            <div class="grid_12">
                <div id="tabNav">
                    <div id="about" class="tabs selected">
                        About
                    </div>
                    <div id="lyrics" class="tabs">
                        Lyrics
                    </div>
                    <div id="shows" class="tabs">
                        Shows
                    </div>
                </div>
            </div>
            <div id="aboutContent" class="tabPane">
                <div class="grid_12">
                    <?php addBox('About Us', 'content/about_us.inc'); ?>
                </div>
            </div>
            <div id="showsContent" class="tabPane">
                <div class="grid_12">
                    <?php addBox('Shows', 'content/shows.inc'); ?>
                </div>
            </div>
            <?php addLyrics(); ?>
            <br/>
        </div>
        <?php require 'js/tag.js.php'; ?>
    </body>
</html>
