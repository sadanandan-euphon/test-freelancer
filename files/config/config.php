<?php
require_once '../files/libphp/display_functions.php';

$connection = mysql_connect("localhost", "root", "");
$database        = mysql_select_db("freelancer", $connection);

