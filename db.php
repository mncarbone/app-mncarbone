<?php
$sql = $_REQUEST['sql'];

$dbhost = getenv('OPENSHIFT_MYSQL_DB_HOST'); // Host name
$dbport = getenv('OPENSHIFT_MYSQL_DB_PORT'); // Host port
$dbusername = getenv('OPENSHIFT_MYSQL_DB_USERNAME'); // MySQL username
$dbpassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD'); // MySQL password
$dbname = getenv('OPENSHIFT_GEAR_NAME'); // Database name

$conn = mysqli_connect($dbhost, $dbusername, $dbpassword);
mysqli_select_db($conn, $dbname);
$res = mysqli_query($conn, $sql);
$data = array();
while($obj = mysqli_fetch_object($res)) $data[] = $obj;
echo json_encode($data);
