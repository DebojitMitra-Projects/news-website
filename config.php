<?php
$servername= 'localhost';
$username='root';
$password='';
$database='news-site';

$conn = mysqli_connect($servername,$username,$password,$database);

if (!$conn) {
    die("Could not connect : " . mysqli_connect_error());
}

?>