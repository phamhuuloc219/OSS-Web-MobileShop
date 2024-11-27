<?php
const DBHOST = 'localhost';
const DBUSER = 'root';
const DBPASS = '';
const DBNAME = 'qlbansua';

$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

if ($conn->connect_error) {
  die('Could not connect to the database!' . $conn->connect_error);
}

mysqli_set_charset($conn, 'UTF8');

function getData($conn, $sql) {
    $result = $conn->query($sql);
    if ($result == TRUE) {
        $data = $result;
    } else {
        echo "<p style='color: red'>Lấy dữ liệu thất bại!</p>";
    }
    return $data;
}