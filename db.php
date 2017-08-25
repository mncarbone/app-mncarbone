<?php
$sql = $_REQUEST['sql'];

$dbhost = getenv('MYSQL_SERVICE_HOST'); // Host name
$dbport = getenv('MYSQL_SERVICE_PORT'); // Host port
$dbusername = getenv('MYSQL_USER'); // MySQL username
$dbpassword = getenv('MYSQL_PASSWORD'); // MySQL password
$dbname = getenv('MYSQL_DATABASE'); // Database name

$conn = mysqli_connect($dbhost, $dbusername, $dbpassword);
mysqli_select_db($conn, $dbname);
$res = mysqli_query($conn, $sql);
$data = array();
while($obj = mysqli_fetch_object($res)) $data[] = $obj;

http_response_code (200);
header('Content-type: application/json');
echo json_encode($data);
