<?php 
$username = $_COOKIE["testusername"];
$q = 0;
$k = 0;
$array = array();
if (!$_COOKIE['testusername']) {
  header("Location: https://weunderstand.ru/index.php");
}


$host = "localhost";
$user = "mikayelyan_wu";
$pass = "hov350988";
$dbname = "mikayelyan_wu";

$mysqli = mysqli_connect($host,$user,$pass,$dbname);


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 

$sql = "SELECT * From users WHERE username = '".$username."'";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_array($result);

$sql1="SELECT username From chat WHERE myusername = '".$username."' ";
$result1=mysqli_query($mysqli, $sql1);
$sql12="SELECT myusername From chat WHERE username = '".$username."' ";
$result12=mysqli_query($mysqli, $sql12);
if ($result1->num_rows || $result12->num_rows) {
    while($rows = $result1->fetch_assoc()) {
        foreach ($rows as $key => $value) {
        	$array[$q] = $value;
            $q++;
        } 
    }
    while($rows = $result12->fetch_assoc()) {
        foreach ($rows as $key => $value) {
          $array[$q] = $value;
            $q++;
        } 
    }

}




 switch ($row['color']) {
  case 1:
    $color1 = 'rgba(0, 130, 160)';
        $color2 = 'rgba(0, 184, 227, 1)';
        $color7 = 'rgba(73, 87,255)';
        $color8 = 'rgba(10, 47, 158)';
    $color3 = '#D6C700';
    $color4 ='#D6C700';
    $color5='#ADA100';
    break;
  
  case 2:
    $color1 = '#42275a';
    $color7='#734b6d';
    $color8='#734b6d';
    $color2 = '#42275a';
    $color3 = '#EAD6F9';
    $color5='#B097C4';
    $color4 = '#EAD6F5';

    break;

  case 3:
    $color1 = '#136a8a';
     $color7='#267871';
    $color8='#267871';
    $color2 = '#136a8a';
    $color3 = '#1EAE98';
    $color4='#1EAE98';
    $color5='#A890FE';
    break;
    
  case 4:
    $color1 = '#0f2027';
    $color2 = '#0f2027';
    $color7='#2c5364';
    $color8='#2c5364';
    $color3 = '#1EAE98';
    $color4='#1EAE98';
    $color5='#A890FE';
    break;
    
  case 5:
    $color1 = '#FFB75E';
    $color2 = '#FFB75E';
    $color7='#ED8F03';
    $color8='#ED8F03';
    $color3 = '#41B57D';
    $color4='#41B57D';
    $color5='#00A088';
    break;  

  default:
    $color1 = 'rgba(0, 130, 160)';
        $color2 = 'rgba(0, 184, 227, 1)';
        $color7 = 'rgba(73, 87,255)';
        $color8 = 'rgba(10, 47, 158)';
    $color3 = '#D6C700';
    $color4 ='#D6C700';
    $color5='#ADA100';
        break;
 }


if (isset($_POST['send'])) {
  $ttt = (isset($_POST["ttt"]) && !empty($_POST["ttt"])) ? $_POST["ttt"] : "";
  $myusername = $_COOKIE['testusername'];
  $sendTo = $_COOKIE['su'];
  $allu = $myusername . "_" . $sendTo;
  $allu1 = $sendTo . "_" . $myusername;
    $sql_u = "SELECT * FROM $allu";
    $sql_e = "SELECT * FROM $allu1";
    $res_u = mysqli_query($mysqli, $sql_u);
    $res_e = mysqli_query($mysqli, $sql_e);
    if ($res_u == true) {
      $sql="INSERT INTO $allu(username, message) VALUES('$username','$ttt')";
      $result = mysqli_query($mysqli, $sql);
    }
    else {
      $sql="INSERT INTO $allu1(username, message) VALUES('$username','$ttt')";
      $result = mysqli_query($mysqli, $sql);
    }

}






// ------------------------- MENU BUTTONS ------------------------- //

if (isset($_POST["logout"])) {
  $mysqli->query("UPDATE users SET online='no' WHERE `username`= '".$_COOKIE["testusername"]."' ");
  setcookie("testusername", "");
  setcookie("su", "");
  header("Location: https://weunderstand.ru/index.php");
}
if (isset($_POST["acc"])) {
  setcookie("su", "");
  header("Location: https://weunderstand.ru/acc.php");
}
if (isset($_POST["cus"])) {
  setcookie("su", "");
  header("Location: https://weunderstand.ru/contactus.php");
}
if (isset($_POST["chat"])) {
  setcookie("su", "");
  header("Location: https://weunderstand.ru/chat.php");
}
if (isset($_POST["service"])) {
  setcookie("su", "");
  header("Location: https://weunderstand.ru/services.php");
}
if (isset($_POST["friend"])) {
  setcookie("su", "");
  header("Location: https://weunderstand.ru/friends.php");
}
if (isset($_POST["forum"])) {
  setcookie("su", "");
  header("Location: https://weunderstand.ru/forum.php");
}
if (isset($_POST["funct"])) {
  setcookie("su", "");
  header("Location: https://weunderstand.ru/function.php");
}

// ------------------------- END OF MENU BUTTONS ------------------------- //




$sql4 = "SELECT callid From users WHERE username = '".$username."'";
$result4 = mysqli_query($mysqli, $sql4);
$row4 = mysqli_fetch_array($result4);

$sql5 = "SELECT callid From users WHERE username = '".$_COOKIE['su']."'";
$result5 = mysqli_query($mysqli, $sql5);
$row5 = mysqli_fetch_array($result5);

$vdcall2=(int)$row5[0] + (int)$row4[0];
$vdcall = "weunderstand".(string)$vdcall2;


if (isset($_POST["videocall"])) {
   $ttt = $username . " просит начать видео чат. Пожалуйста нажмите на иконку видео";
  $myusername = $_COOKIE['testusername'];
  $sendTo = $_COOKIE['su'];
  $allu = $myusername . "_" . $sendTo;
  $allu1 = $sendTo . "_" . $myusername;
    $sql_u = "SELECT * FROM $allu";
    $sql_e = "SELECT * FROM $allu1";
    $res_u = mysqli_query($mysqli, $sql_u);
    $res_e = mysqli_query($mysqli, $sql_e);
    if ($res_u == true) {
      $sql="INSERT INTO $allu(username, message) VALUES('$username','$ttt')";
      $result = mysqli_query($mysqli, $sql);
    }
    else {
      $sql="INSERT INTO $allu1(username, message) VALUES('$username','$ttt')";
      $result = mysqli_query($mysqli, $sql);
    }
    header("Location: https://appr.tc/r/".$vdcall);
}

 ?>


<?php 
$arr = array();
$gender = "";
for ($i=0; $i < $q; $i++) { 
	$sql3 = "SELECT gender From users WHERE username = '".$array[$i]."'";
	$result3 = mysqli_query($mysqli, $sql3);
	$row3 = mysqli_fetch_row($result3);
	$value = $row3[0];
	if ($value == "Мужской") {
		$gender = "images/avatar1.png";
	}
	else if ($value == "Женский") {
		$gender = "images/avatar2.jpg";
	}
	else {
		$gender = "images/avatar3.png";
	}
	$arr[$i] = "<li class='person' id='person".$i."'  onclick='setcook".$i."(), scroll1()'>
	   	<div class='user'>
			<img src='".$gender."'>
		</div>
		<p class='name-time'>
			<span class='name' id='name".$i."'>".$array[$i]."</span>
		</p>
	   </li>";
}



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>WEunderstand Chat</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/chat1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=<5847c7bd-81b1-4ef9-a1e4-c021001d4623>" type="text/javascript"></script>
  
    <style type="text/css">
    	body {
        background-image: linear-gradient(to bottom left, <?php echo $color1; ?>, <?php echo $color2; ?>, <?php echo $color7; ?>, <?php echo $color8; ?>);
      }

       .fa-paint-brush{
    font-size: 19px;
     padding-right: 5px;
     padding-top: 10px;
  }
  .task3{
  	background: linear-gradient(to bottom right, <?php echo $color4; ?>, <?php echo $color5; ?>);
  }
  .task4:hover{
  		background: linear-gradient(to bottom right, <?php echo $color3; ?>, <?php echo $color3; ?>);
  }
#marker{
	background:  <?php echo $color3; ?> !important;
}
 .color1 {
    background-image: linear-gradient(to bottom left, rgba(0, 130, 160), rgba(0, 184, 227, 1), rgba(73, 87,255), rgba(10, 47, 158));
    width: 80px;
    margin-right: 7px;
  }
   .color2 {
    background-image: linear-gradient(to bottom right, #42275a, #734b6d);
    width: 80px;
    margin-right: 7px;
  }
   .color3 {
    background-image: linear-gradient(to bottom right, #136a8a, #267871);
    width: 80px;
    margin-right: 7px;
  }
   .color4 {
    background-image: linear-gradient(to bottom right, #0f2027, #2c5364);
    width: 80px;
    margin-right: 7px;
  }
   .color5 {
    background-image: linear-gradient(to bottom right, #FFB75E, #ED8F03);
    width: 80px;
    margin-right: 7px;
  }
  .btnguyn {
    color: #fff;
    background-color: <?php echo $color1; ?>;
    border-color: <?php echo $color1; ?>;
  }
  .btnguyn:hover{
    background-color: <?php echo $color2; ?>;
    border-color: <?php echo $color2; ?>;
  }
  .savebut {
  	color: #fff;
    background-color: <?php echo $color1; ?>;
    max-width: 700px;
    width: 100%;
    min-width: 150px;
  }
  .savebut:hover {
  	color: <?php echo $color1; ?>;
    background-color: white;
    border: 1px solid <?php echo $color1; ?>;
}
#ttt {
	height: 50px;
}

    </style>
</head>
<body>
	  <header>
    <div class="container">
        <div class="row" >
          <div class="col-lg-2 justify-content-center d-flex">
            <a href="#">
              <img src="images/logo1.png" alt="" class="logo">
            </a>
          </div>
          <div class="col-lg-10 d-flex d_menu justify-content-end">
			<form action="" method="post">
            <nav class="lists">
              <ul id="main">
                <li class="task4"><button type="submit" name="funct" id="logout" style="color: white;"><b>ФУНКЦИИ</b></button></li>
              <li class="task4"><button type="submit" name="service" id="logout" style="color: white;"><b>СЕРВИСЫ</b></button></li>
              
              <li class="task4 task44"><b>Чаты<i class="fa fa-chevron-down"></i></b>
                  <ul class="drop">
                    <div class="task3">
                    <li class="task5"><button type="submit" name="chat" id="logout" style="color: white;"><b>МОИ ЧАТЫ</b></button></li>
                    <li><button type="submit" name="forum" id="logout" style="color: white;"><b>ФОРУМ</b></button></li>

                    
                    </div>
                  </ul>
                </li>
              
              <li class="task4 task44"><b>Профиль<i class="fa fa-chevron-down"></i></b>
                  <ul class="drop">
                    <div class="task3">
                    <li class="task5"><button type="submit" name="acc" id="logout" style="color: white;"><b>АККАУНТ</b></button></li>
                    <li><button type="submit" name="friend" id="logout" style="color: white;"><b>ДРУЗЬЯ</b></button></li>
                    <li><button type="submit" name="cus" id="logout" style="color: white;"><b>ОБРАТНАЯ СВЯЗЬ</b></button></li>
                    <li><button type="submit" name="logout" id="logout" style="color: white;"><b>ВЫЙТИ</b></button></li>
                    
                    </div>
                  </ul>
                </li>
                
                <div id="marker"></div>
              </ul>
                
            </nav>
        </form>
        </div>  
      </div>
  </header>

  <main>
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">

    <!-- Page header start -->
    <div class="page-title">

    </div>
    <!-- Page header end -->

    <!-- Content wrapper start -->
    <div class="content-wrapper">

        <!-- Row start -->
        <div class="row gutters" style="max-height: 700px; min-height: 500px;">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="card m-0">

                    <!-- Row start -->
                    <div class="row no-gutters">
                      
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3">
                            <div class="users-container">
                                <div class="chat-search-box">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Поиск">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-info btnguyn">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <ul class="users">
                                	<?php
                                    for ($i=0; $i < $q; $i++) { 
                                		  echo $arr[$i];
                                	   } 
                                  ?>  
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9">
                            <div class="selected-user">
<!--                                <ul class="chat-box ">
	                                <div id="miban">  	
	                                	
	                                </div>
                                </ul> -->








							<form method="post">

                           		<button type="submit" name="videocall" class="btn btn-lg "><i  class="fa fa-video-camera "></i></button>

							</form>





                            </div>
                            <div class="chat-container">
                               
                                <ul class="chat-box chatContainerScroll">
                                	<div id="u1"  style="overflow-y: scroll; height:300px;">
										
                                	</div>
                                    
                                </ul>
                               <form method="post" id="myform"> 
                                  <div class="form-group mt-3 mb-0">
                                    <textarea class="form-control" rows="3" id="ttt" placeholder="Type your message here..." name="ttt"></textarea>
                                </div>
                                <div class="form-group mt-3 mb-0">
                                  <button type="submit" name="send" class="btn btn-lg savebut">Отправить</button>
                                </div>
                                </form>
                            </div>
                        </div>
                      
                    </div>
                    <!-- Row end -->
                </div>

            </div>

        </div>
        <!-- Row end -->

    </div>
    <!-- Content wrapper end -->

</div>    
        </main>

















     <script type="text/javascript">
    
  $(document).ready(function() {
    setInterval(function() {
      $('#u1').load('data.php')
    }, 1000);
  });

 </script> 




<!-- 
   <script type="text/javascript">
    
  $(document).ready(function() {
      $('#miban').load('data1.php')
  });

 </script>  -->





  <script type="text/javascript">
  
    	function scroll1() {
    		window.setTimeout(function(){
       			var objDiv = document.getElementById("u1");
			objDiv.scrollTop = objDiv.scrollHeight;
			}, 1000);
      		
    	}
    </script>

 <script type="text/javascript">
	
	function setcook0() {
    	var name = document.getElementById("name0");
    	var cook = name.innerText;
    	document.cookie = "su=" + cook + "";
     	
    };
   function setcook1() {
    	var name = document.getElementById("name1");
    	var cook = name.innerText;
    	document.cookie = "su=" + cook + "";
    };
    function setcook2() {
    	var name = document.getElementById("name2");
    	var cook = name.innerText;
    	document.cookie = "su=" + cook + "";
    };
    function setcook3() {
    	var name = document.getElementById("name3");
    	var cook = name.innerText;
    	document.cookie = "su=" + cook + "";
    };
    function setcook4() {
    	var name = document.getElementById("name4");
    	var cook = name.innerText;
    	document.cookie = "su=" + cook + "";
    };


 </script>
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>