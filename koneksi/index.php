<?php
$hostname = "localhost";
$username = "root";
$password = "root";
$dbname = "fullcalendar";

$koneksi = mysqli_connect($hostname, $username, $password, $dbname);

$route = "http://localhost:8888/fullcalendar/";

// if ($koneksi) {
//     echo "koneksi berhasil";
// } else {
//     echo "koneksi gagal";
// }
