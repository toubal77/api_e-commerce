<?php 

$local = 'localhost';
$root = 'root';
$passwordLocal = '';
$database = 'grosmetique';

$connection = mysqli_connect($local,$root,$passwordLocal,$database);
if(!$connection){
    die('CONNECTION TO DATABASE FIELD' .mysqli_error($connection));
}

?>