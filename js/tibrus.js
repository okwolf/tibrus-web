
if (!$defined(console)) 
    var console = {
        log: function(){
        }
    };
soundManager.url = 'swf/';
var volumeSliderValue = 100;
var globalVolume = 100;
var pageTracker = null;
var PP_CONFIG = {
    flashVersion: 9, // version of Flash to tell SoundManager to use - either 8 or 9.
    debugMode: false, // enable debugging output (div#soundmanager-debug, OR console if available + configured)
    flashLoadTimeout: 1000, // msec to wait for flash movie to load before failing (0 = infinity)
    allowPolling: true, // allow flash to poll for status update (required for whileplaying() events, peak, sound spectrum functions to work.)
    useFastPolling: true, // uses 1 msec flash timer interval (vs. default of 20) for higher callback frequency, best combined with useHighPerformance
    useHighPerformance: true, // position:fixed flash movie can help increase js/flash speed, minimize lag
    usePeakData: false, // [Flash 9 only] show peak (VU-meter) data
    useFavIcon: false, // try to show peakData in address bar (Firefox + Opera) - requires usePeakData = true too, of course.
    useWaveformData: false, // [Flash 9 only] true: show raw waveform data - WARNING: CPU-intensive
    useEQData: false, // [Flash 9 only] show EQ (frequency spectrum) data - WARNING: CPU-intensive
    fillGraph: false, // [Flash 9 only] draw full lines instead of only top (peak) spectrum points
    allowRightClick: true, // let users right-click MP3 links ("save as...", etc.) or discourage (can't prevent.)
    allowFullScreen: true, // enter full-screen (via double-click on movie) for flash 9+ video
    useThrottling: false, // try to rate-limit potentially-expensive calls (eg. dragging position around)
    autoStart: false, // begin playing first sound when page loads
    playNext: true, // stop after one sound, or play through list until end
    updatePageTitle: true, // change the page title while playing sounds
    emptyTime: '-:--', // null/undefined timer values (before data is available)
    useMovieStar: true, // Flash 9.0r115+ only: Support for a subset of MPEG4 formats.
    events: {
        onplay: function(){
            try {
                this.lastSound.setVolume(globalVolume);
            } 
            catch (err) {
                console.log(err.message);
            }
            setButtonPlay();
            setTimeout(function(){
                sampleTrack();
                updateLyricPlayLinks();
            }, 100);
        },
        onstop: function(){
            setButtonPause();
        },
        onpause: function(){
            setButtonPause();
            setTimeout(function(){
                updateLyricPlayLinks();
            }, 100);
        },
        onresume: function(){
            try {
                this.lastSound.setVolume(globalVolume);
            } 
            catch (err) {
                console.log(err.message);
            }
            setTimeout(function(){
                updateLyricPlayLinks();
            }, 100);
            setButtonPlay();
        },
        onfinish: function(){
            setButtonPause();
        },
        onwhileplaying: function(){
            try {
                this.lastSound.setVolume(globalVolume);
            } 
            catch (err) {
                console.log(err.message);
            }
        }
    }
}
/* Google Analytics */
function pageTrack(page){
    try {
        console.log('TRACKING: ' + page);
        pageTracker._trackPageview(page);
    } 
    catch (err) {
        console.log(err.message);
    }
}

function tabTrack(tab){
    pageTrack('/tabs/' + tab);
}

function lyricsTrack(lyrics){
    pageTrack('/lyrics/' + lyrics);
}

function sampleTrack(){
    try {
        var songId = getCurrentPlayingLink().getParent('li.playlistSong').get('id');
        pageTrack('/samples/' + songId);
    } 
    catch (err) {
        console.log(err.message);
    }
}

function outgoingTrack(link){
    pageTrack('/outgoing/' + link);
}

function lightboxTrack(pic){
    pageTrack('/lightbox/' + pic);
}

/* End Google Analytics*/

/* Custom functions */
function getCurrentPlayingLink(){
    return $$('ul.playlist li.sm2_playing a')[0];
}

function getCurrentTrackLink(){
    return $$('ul.playlist li.sm2_playing a, ul.playlist li.sm2_paused a')[0];
}

function getCurrentTrackId(){
    var trackId = -1;
    try {
        trackId = pagePlayer.links.indexOf(getCurrentTrackLink());
    } 
    catch (err) {
        console.log(err.message);
    }
    return trackId;
};

function updateLyricPlayLinks(){
    $$('a.playSong').each(function(element){
        if (element.hasClass('samplePlaying')) 
            element.removeClass('samplePlaying');
        if (element.hasClass('samplePaused')) 
            element.removeClass('samplePaused');
        if (getCurrentPlayingLink() && getCurrentPlayingLink().get('href').contains(element.get('href'))) 
            element.addClass('samplePlaying');
        else 
            element.addClass('samplePaused');
    });
}

var setButtonPlay = function(){
    try {
        if ($('player-play')) 
            $('player-play').set('id', 'player-pause');
    } 
    catch (err) {
        console.log(err.message);
    }
}
var setButtonPause = function(){
    try {
        if ($('player-pause')) 
            $('player-pause').set('id', 'player-play');
    } 
    catch (err) {
        console.log(err.message);
    }
}
var setButtonMute = function(){
    try {
        if ($('player-mute')) 
            $('player-mute').set('id', 'player-unmute');
        $('player-unmute').removeClass('hover');
    } 
    catch (err) {
        console.log(err.message);
    }
}
var setButtonUnmute = function(){
    try {
        if ($('player-unmute')) 
            $('player-unmute').set('id', 'player-mute');
        $('player-mute').removeClass('hover');
    } 
    catch (err) {
        console.log(err.message);
    }
}

var tabClick = function(tabId){
    try {
        if ($(tabId).hasClass('selected')) 
            return;
        tabTrack(tabId);
        $$('.tabPane').hide();
        var content = $(tabId + 'Content');
        fadeInElement(content, 2);
        $$('.tabs').removeClass('selected');
        $(tabId).addClass('selected');
    } 
    catch (err) {
        console.log(err.message);
        setTimeout(function(){
            tabClick(tabId);
        }, 100);
    }
}

var fadeInElement = function(element, duration){
    try {
        element.set('tween', {
            duration: duration * 1000
        });
        element.setStyles({
            opacity: '0',
            display: 'block'
        });
        element.fade('in');
    } 
    catch (err) {
        console.log(err.message);
    }
}

/* Attach Event Handlers */
window.addEvent('load', function(){

    try {
        pageTracker = _gat._getTracker("UA-10365928-1");
        pageTracker._trackPageview();
    } 
    catch (err) {
        console.log(err.message);
    }
    
    $$('#webIcons a.webIcon, a.storeLink, a.outgoing').each(function(element){
        element.set('target', '_blank');
        element.addEvent('click', function(){
            outgoingTrack(element.get('href'));
        });
    });
    
    try {
        $$('a[rel="lightbox-bandPhoto"]').each(function(element){
            element.addEvent('click', function(){
                lightboxTrack(element.get('href'));
            });
        });
    } 
    catch (err) {
        console.log(err.message);
    }
    
    $$('#lyricsContent,#showsContent').each(function(element){
        element.hide();
    });
    
    $$('#tabNav div.tabs').each(function(element){
        fadeInElement(element, 5);
    });
    
    fadeInElement($('player-controls'), 5);
    
    $$('.tabs').addEvent('click', function(e){
        try {
            var tabId = e.target.getProperty('id');
            tabClick(tabId);
        } 
        catch (err) {
            console.log(err.message);
        }
    });
    
    $$('a.songLyricsLink').each(function(element){
        element.addEvent('click', function(e){
            /*For lyrics link, select the lyrics tab
             and use Mootools to scroll to the right lyric
             */
            e.stop();
            tabClick('lyrics');
            var songId = element.getParent('li.playlistSong').get('id');
            lyricsTrack(songId);
            var myFx = new Fx.Scroll(window).toElement(songId + '-lyrics');
        });
    });
    
    $$('ul.songMenu').each(function(element){
        new MenuMatic({
            id: element.get('id')
        });
    });
    
    $$('a.songBuyLink').each(function(element){
        element.addEvent('click', function(e){
            e.stop();
            return false;
        });
    });
    
    // Volume controls
    var volume = $('volume');
    
    new Slider(volume, volume.getElement('.knob'), {
        steps: 100,
        range: [0],
        onChange: function(value){
            volumeSliderValue = value;
            globalVolume = value;
            if (value == 0) 
                setButtonMute();
            else 
                setButtonUnmute();
        }
    }).set(globalVolume);
    
    //Attach real class equivalents for pseudo classes that don't work well in IE
    $$('#player-controls .player-button, ul.playlist li, #tabNav div.tabs').each(function(element){
        element.addEvent('mouseover', function(e){
            element.addClass('hover');
        });
        element.addEvent('mouseout', function(e){
            element.removeClass('hover');
            element.removeClass('active');
        });
        element.addEvent('mousedown', function(e){
            element.addClass('active');
        });
        element.addEvent('mouseup', function(e){
            element.removeClass('active');
        });
    });
    
    $('player-play').addEvent('click', function(e){
        e.stop();
        try {
            if (pagePlayer.lastSound == null) {
                //If playback hasn't started, play the first song
                e.target = pagePlayer.links[0];
                pagePlayer.handleClick(e);
            }
            else {
                //If playback has started, click the current link to play/pause
                e.target = pagePlayer.links[getCurrentTrackId()];
                pagePlayer.handleClick(e);
            }
        } 
        catch (err) {
            console.log(err.message);
        }
    });
    
    $('player-prev').addEvent('click', function(e){
        e.stop();
        try {
            if (pagePlayer.lastSound == null) {
                //TODO: should the previous button do anything before playback has started?
                //Coffey: I don't think so
            }
            else {
                //If playback has started, click the link before the current, wrapping around
                var currentId = getCurrentTrackId();
                if (currentId == 0) 
                    currentId = pagePlayer.links.length;
                e.target = pagePlayer.links[currentId - 1];
                pagePlayer.handleClick(e);
            }
        } 
        catch (err) {
            console.log(err.message);
        }
    });
    
    $('player-next').addEvent('click', function(e){
        e.stop();
        try {
            if (pagePlayer.lastSound == null) {
                //TODO: should the next button do anything before playback has started?
                //Coffey: I don't think so
            }
            else {
                //If playback has started, click the link after the current, wrapping around
                var currentId = getCurrentTrackId();
                if (currentId == pagePlayer.links.length - 1) 
                    currentId = -1;
                e.target = pagePlayer.links[currentId + 1];
                pagePlayer.handleClick(e);
            }
        } 
        catch (err) {
            console.log(err.message);
        }
    });
    
    $('player-mute').addEvent('click', function(e){
        e.stop();
        //If already muted, restore the level from the volume slider
        if (globalVolume == 0) {
            setButtonUnmute();
            globalVolume = volumeSliderValue;
        }
        else {
            setButtonMute();
            globalVolume = 0;
        }
    });
    
    //When a playSong link is clicked, determine if it's the one playing,
    //and if not, fire a click on it.
    $$('div.boxContent a.playSong').each(function(element){
        element.addEvent('click', function(e){
            e.stop();
            try {
                var event = {};
                var parentId = e.target.getParent('div.box').get('id');
                event.target = $$('#' + parentId.split('-')[0] + ' a')[0];
                pagePlayer.handleClick(event);
            } 
            catch (err) {
                console.log(err.message);
            }
        });
    });
});
