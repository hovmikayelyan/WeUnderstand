<?php 

$username = $_COOKIE["testusername"];
$forumname= $_COOKIE["forumname"];

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



$sql1 = "SELECT forumname From forumnames WHERE id = '".$forumname."'";
$result1 = mysqli_query($mysqli, $sql1);
$row1 = mysqli_fetch_array($result1);

$vazgenchik=$row1[0];

if (isset($_POST["send"])) {
	$message =(isset($_POST["msg"]) && !empty($_POST["msg"])) ? $_POST["msg"] : "default";
	$slq="INSERT INTO $vazgenchik(username, message) VALUES('$username','$message')";
	$serult=mysqli_query($mysqli, $slq);
}





$namearr=array();
$allmsg=array();
$allusr=array();
$arr=array();

$sql1="SELECT forumname From forumnames ";
$result1=mysqli_query($mysqli, $sql1);
$q=0;
if ($result1->num_rows) {
    while($rows = $result1->fetch_assoc()) {
        foreach ($rows as $key => $value) {
			     $namearr[$q]=$value;
            $q++;

        } 
    }
} 


$sql2="SELECT * From $namearr[$forumname]";
$result2=mysqli_query($mysqli, $sql2);

$sql3="SELECT id From $namearr[$forumname]";
$result3=mysqli_query($mysqli, $sql3);

$sql4="SELECT username From $namearr[$forumname]";
$result4=mysqli_query($mysqli, $sql4);

$sql5="SELECT message From $namearr[$forumname]";
$result5=mysqli_query($mysqli, $sql5);

$c=0;
if ($result3->num_rows) {
    while($rows = $result3->fetch_assoc()) {
        foreach ($rows as $key => $value) {
            $c++;
        } 
    }
} 


$au=0;
if ($result4->num_rows) {
    while($rows = $result4->fetch_assoc()) {
        foreach ($rows as $key => $value) {
          $allusr[$au]=$value;
            $au++;
        } 
    }
} 


$am=0;
if ($result5->num_rows) {
    while($rows = $result5->fetch_assoc()) {
        foreach ($rows as $key => $value) {
          $allmsg[$am]=$value;
            $am++;
        } 
    }
} 


$avatar=array();
$ag=0;

for ($i=0; $i < $c; $i++) { 
  $sql6="SELECT gender From users WHERE username='".$allusr[$i]."'";
  $result6=mysqli_query($mysqli, $sql6);
  if ($result6->num_rows) {
      while($rows = $result6->fetch_assoc()) {
          foreach ($rows as $key => $value) {
              if ($value == "Мужской") {
                $avatar[$ag] = "images/avatar1.png";
              }
              elseif ($value == "Женский") {
                $avatar[$ag] = "images/avatar2.jpg";
              }
              else {
                $avatar[$ag] = "images/avatar3.png";
              }
              $ag++;
          } 
      }
  } 

}



  



for ($i=0; $i < $c; $i++) { 

  $arr[$i] = "
        <div class='row forum-back '>
        <div class='col-lg-3 vandak justify-content-center'>
          <img class='center-block img-responsive rounded img-thumbnail thumb96 mt' src='".$avatar[$i]."' alt='Contact'>
          <h4>@".$allusr[$i]."</h4>
        </div>
        <div class='col-lg-7 forum-baj '>     
          <div class='forumDescr forumTextMax'>".$allmsg[$i]." </div>
        </div>
      </div>";

}

 ?>



 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/forumpage.css">
	<title>WEunderstand Forum</title>
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


  .goback {
    display: inline-block;
  }
  .goback a {
    color: white;
    text-decoration: none;
    font-size: 25px;
  }
  .osnovnie {
    display: inline-block;
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
		<div class="container">
			
			<div class="row" style="border-bottom: 1px solid white">
				 	<div class="col-lg-12 osnovnie">
            <div class="goback"><a href="http://weunderstand.ru/forum.php" class="fa fa-chevron-circle-left"></a></div>
				 		<div class="osnovnie " >
				 			<h4 style="color: white;"><?php echo $row1[0]; ?></h4>
				 		</div>
				 	</div>
			</div> 
			<div class="row backcl">
				<form method="post">
					<div class="col-lg-12 osnovnie d-flex justify-content-center">
						<textarea name="msg" id="" style="width: 900px;"></textarea>
						<button type="submit" name="send" class="btn btn-info" style="margin-left: 30px;">Отправить</button>
					</div>
				</form>
			</div>
					<?php for ($i=$c; $i >=0; $i--) { 
                        echo $arr[$i];
                    } ?> 
			
		</div>
	</main>








  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>