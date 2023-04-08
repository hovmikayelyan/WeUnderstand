<?php

$host = "localhost";
$user = "mikayelyan_wu";
$pass = "hov350988";
$dbname = "mikayelyan_wu";
$mysqli = mysqli_connect($host,$user,$pass,$dbname);


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 

$name = ($_POST['postName']);
$message =  ($_POST['postMessage']);
$sendTo = $_COOKIE['su'];
$allu = $name . "_" . $sendTo;
$allu1 = $sendTo . "_" . $name;
$sql_u = "SELECT * FROM $allu";
$sql_e = "SELECT * FROM $allu1";
$res_u = mysqli_query($mysqli, $sql_u);
$res_e = mysqli_query($mysqli, $sql_e);
if ($res_u == true) {
	$mysqli->query("INSERT INTO $allu(username, message) VALUES('$name','$message')");
}
else {
  $mysqli->query("INSERT INTO $allu1(username, message) VALUES('$name','$message')");
}


 
?>