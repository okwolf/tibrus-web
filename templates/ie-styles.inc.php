<?php 
function addIEStyles() {
    echo<<<HTML
	<!--[if lte IE 7]>
		<style type="text/css">
			ul#player {margin-top:174px;}
		</style>
	<![endif]-->
	<!--[if IE 6]>
		<style type="text/css">
			img, div, a, h3 {
			    behavior: url(js/iepngfix.htc)
			}
			ul.playlist li {
				padding: 0.5em 1em;
			}
			ul#player {margin-top:170px;}
		</style>
	<![endif]-->
HTML;
}
?>
