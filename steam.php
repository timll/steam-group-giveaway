<?php

$groupname = $_GET['group'];

$url = "http://steamcommunity.com/groups/".$groupname."/memberslistxml/?xml=1";
$xml = simplexml_load_file($url);

$members = array();
for($i = 0; $i < $xml->memberCount; $i++) {
    array_push($members, $xml->members->steamID64[$i]);
}

$winner = $members[rand(0, $xml->memberCount-1)];

$url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=XXXXXXXX&steamids=". $winner ."&format=xml";
$xml = simplexml_load_file($url);


echo $winner . "TarU1LJqoNIR" .$xml->players->player->personaname . "EG9hLoUjP4xj" . $xml->players->player->avatarfull;
