<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";//<! no password since we are in local host>;
$dbname = "login_sample_db";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

    die("failed to connect");
}
