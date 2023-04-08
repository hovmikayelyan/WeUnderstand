<?php 

$host = "localhost";
$user = "mikayelyan_wu";
$pass = "hov350988";
$dbname = "mikayelyan_wu";


$mysqli = mysqli_connect($host,$user,$pass,$dbname);


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 

$q = 0;

$myusername = $_COOKIE['testusername'];
$sendTo = $_COOKIE['su'];

$allu = $myusername . "_" . $sendTo;
$allu1 = $sendTo . "_" . $myusername;

$sql_u = "SELECT * FROM $allu";
$sql_e = "SELECT * FROM $allu1";
$res_u = mysqli_query($mysqli, $sql_u);
$res_e = mysqli_query($mysqli, $sql_e);

	$sql3 = "SELECT gender From users WHERE username = '$myusername'";
	$result3 = mysqli_query($mysqli, $sql3);
	$row3 = mysqli_fetch_row($result3);
	$sql4 = "SELECT gender From users WHERE username = '$sendTo'";
	$result4 = mysqli_query($mysqli, $sql4);
	$row4 = mysqli_fetch_row($result4);
	$value1 = $row3[0];
	$value2 = $row4[0];
	if ($value1 == "Мужской") {
		$gender1 = "images/avatar1.png";
	}
	else if ($value1 == "Женский") {
		$gender1 = "images/avatar2.jpg";
	}
	else {
		$gender1 = "images/avatar3.png";
	}
	
	if ($value2 == "Мужской") {
		$gender2 = "images/avatar1.png";
	}
	else if ($value2 == "Женский") {
		$gender2 = "images/avatar2.jpg";
	}
	else {
		$gender2 = "images/avatar3.png";
	}



if ($res_u == true) {
	$sql = "SELECT * From $allu";
	$result = mysqli_query($mysqli, $sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				if ($row['username'] == $myusername) {
					echo "<li class='chat-right'>
            					<div class='chat-text'>".$row['message']."</div>
            					<div class='chat-avatar'>
                					<img src='".$gender1."'>
                					<div class='chat-name'>".$row['username']."</div>
            					</div>
         					</li>";
				}
				else {
					echo "<li class='chat-left'>
            					<div class='chat-avatar'>
                					<img src='".$gender2."'>
                					<div class='chat-name'>".$row['username']."</div>
            					</div>
            					<div class='chat-text'>".$row['message']."</div>
         					</li>";
				}
			}
		}
}
else if ($res_e == true) {
	$sql = "SELECT * From $allu1";
	$result = mysqli_query($mysqli, $sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				if ($row['username'] == $myusername) {
					echo "<li class='chat-right'>
            				<div class='chat-text'>".$row['message']."</div>
            				<div class='chat-avatar'>
                				<img src='".$gender1."'>
                				<div class='chat-name'>".$row['username']."</div>
            				</div>
         				</li>";
				}
				else {
					echo  "<li class='chat-left'>
            				<div class='chat-avatar'>
                				<img src='".$gender2."'>
                				<div class='chat-name'>".$row['username']."</div>
            				</div>
            				<div class='chat-text'>".$row['message']."</div>
         				</li>";
				}
			}
		}
}


// if ($result->num_rows) {
//     while($rows = $result1->fetch_assoc()) {
//         foreach ($rows as $key => $value) {
//         	$array[$q] = $value;
//             $q++;
//         } 
//     }
// }



?>