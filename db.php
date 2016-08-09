<?php
$sql = $_REQUEST['sql'];
$usr = $_REQUEST['usr'];
$pass = $_REQUEST['pass'];
$db = $_REQUEST['db'];

$conn = mysqli_connect('localhost', $usr, $pass);
mysqli_select_db($conn, $db);
$res = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($res);
echo json_encode($data);
?>