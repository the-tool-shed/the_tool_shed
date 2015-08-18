<?php 

require_once 'Ad.php';

// $date = new DateTime(date('Y-m-d'));
// $date->add(new DateInterval('P21D'));

// $ad = new Ad();
// $ad->user_id = 6;
// $ad->city_id = 3;
// $ad->category_id = 4;
// $ad->post_date = date('Y-m-d');
// $ad->expire_date = $date->format('Y-m-d');
// $ad->highlights = 'My mom is a chef, I have more money than sense, Texas forever';
// $ad->description = 'I will teach you how to make yummy pastries.';
// $ad->save();

// $ads = Ad::all();
// var_dump($ads);

// $ad = Ad::findById(2);
// var_dump($ad);
// echo $ad[0]['post_date'] . PHP_EOL;

$myPosts = Ad::usernameSearch('dgcollier');
var_dump($myPosts);

// $byId = Ad::findById(2);
// var_dump($byId);