<?php

require_once 'Ad.php';

$hl = Ad::getHighlights(1);
// var_dump($hl);



$highlights = explode(', ', $hl[0]['highlights']);




