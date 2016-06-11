<?php 
function css_strip_whitespace($txt) {
    // Compress whitespace.
    $txt = preg_replace('/\s+/', ' ', $txt);
    $txt = preg_replace('/\s*,\s*/', ',', $txt);
    $txt = preg_replace('/\s*{\s*/', '{', $txt);
    $txt = preg_replace('/\s*}\s*/', '}', $txt);
    $txt = preg_replace('/\s*:\s*/', ':', $txt);
    $txt = preg_replace('/\s*;\s*/', ';', $txt);
    // Remove comments.
    $txt = preg_replace('/\/\*.*?\*\//', '', $txt);
    return $txt;
}
?>
