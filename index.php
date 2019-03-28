<?php
$like = 0;
$dislike = 0;
$url = 'https://gateway.marvel.com/v1/public/comics?startYear=2019&limit=100&ts=1&apikey=b5dd158dd0e856443db7fb726fbc6bc9&hash=80182fcb24c6426319114b9e34eafed6';
$json = file_get_contents($url);
$datos = json_decode($json, true);
$comics = $datos['data']['results'];

?>