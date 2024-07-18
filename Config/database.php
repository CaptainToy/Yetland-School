<?php
require 'config/constant.php';

// connect to db
$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($connection->connect_errno) {
    die($connection->connect_error);
}
