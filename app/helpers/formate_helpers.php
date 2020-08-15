<?php
//trim post description
function textExcerpt($text, $limit = 400){
    $text = substr($text, 0, $limit);
    $text = substr($text, 0, strrpos($text, ' '));
    $text = $text. "...";
    return $text;
}