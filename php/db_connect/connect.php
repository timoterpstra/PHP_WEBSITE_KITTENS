<?php
function _Connect_db()
{
    DEFINE ('DB_USER', 'kit');
    DEFINE ('DB_PASSWORD', 'race');
    DEFINE ('DB_HOST', '127.0.0.1:3307');
    DEFINE ('DB_NAME', 'kittens');

    $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    OR die('Could not connect to MySQL: ' . mysqli_connect_error());

    return $dbc;
}