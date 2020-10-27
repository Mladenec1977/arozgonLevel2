<?php
function check_string_html($string) {
    $string = strip_tags($string);
    $string = htmlspecialchars($string);
    return $string;
}