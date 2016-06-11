<?php 
function addBox($title, $content, $dontGetFromFile=false) {
	if ($dontGetFromFile){
		$contentHTML = $content;
	}
	else {
		$contentHTML = file_get_contents($content);
	}
	
    echo<<<HTML
<div class="box">
    <h3 class="boxHeader">
        <span class="boxHeaderContent">
            $title
        </span>
    </h3>
    <div class="boxContent">
        $contentHTML
    </div>
    <div class="boxFooter"></div>
</div>
HTML;
}
?>
