<?php

function showDateTime($carbon, $format = "d M Y, H:i"){
    return $carbon -> translatedFormat($format);
}

function showDateTime2($carbon, $format = "l, d F Y"){
    return $carbon -> translatedFormat($format);
}

function showDateTime3($carbon, $format = "d M Y"){
    return $carbon -> translatedFormat($format);
}

function showDateTime4($carbon, $format = "Y-m-d"){
    return $carbon -> translatedFormat($format);
}
