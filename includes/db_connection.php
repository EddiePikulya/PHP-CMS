<?php
    define("DB_SERVER", "127.0.0.1");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "pages_cms");
$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if(mysqli_connect_errno()) {
    die("Connection failed: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno() . ")");
}
?>