<?php 

require_once 'User.php';

// $date = new DateTime(date('Y-m-d'));
// $date->add(new DateInterval('P21D'));

$user = new User();
$user->username = 'rorsinger';
$user->email = 'songbird@codeup.com';
$user->city_id = 4;
$user->join_date = date('Y-m-d');

$user->save();

$user = User::all();

var_dump($user); 