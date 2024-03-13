<?php

function formatStars($num) {
    $stars = '';

    for ($i=0; $i < $num; $i++) { 
        $stars .= '⭐';
    }

    return $stars;
}