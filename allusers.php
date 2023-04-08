<?php 

$username = $_COOKIE['testusername'];

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

if (isset($_POST["search_sbm"])) {
 $username1 = (isset($_POST["siu"]) && !empty($_POST["siu"])) ? $_POST["siu"] : "default";
 setcookie("siu",$username1);
 header("Refresh:0");
}
// ------------------------- MENU BUTTONS ------------------------- //

if (isset($_POST["logout"])) {
  $mysqli->query("UPDATE users SET online='no' WHERE `username`= '".$_COOKIE["testusername"]."' ");
  setcookie("testusername", "");
  setcookie("su", "");
  setcookie("siu","");
  header("Location: https://weunderstand.ru/index.php");
}
if (isset($_POST["acc"])) {
  setcookie("su", "");
  setcookie("siu","");
  header("Location: https://weunderstand.ru/acc.php");
}
if (isset($_POST["cus"])) {
  setcookie("su", "");
  setcookie("siu","");
  header("Location: https://weunderstand.ru/contactus.php");
}
if (isset($_POST["chat"])) {
  setcookie("su", "");
  setcookie("siu","");
  header("Location: https://weunderstand.ru/chat.php");
}
if (isset($_POST["service"])) {
  setcookie("su", "");
  setcookie("siu","");
  header("Location: https://weunderstand.ru/services.php");
}
if (isset($_POST["friend"])) {
  setcookie("su", "");
  setcookie("siu","");
  header("Location: https://weunderstand.ru/friends.php");
}
if (isset($_POST["forum"])) {
  setcookie("su", "");
  setcookie("siu","");
  header("Location: https://weunderstand.ru/forum.php");
}
if (isset($_POST["funct"])) {
  setcookie("su", "");
  setcookie("siu","");
  header("Location: https://weunderstand.ru/function.php");
}

// ------------------------- END OF MENU BUTTONS ------------------------- //

$sql5 = "SELECT * From users WHERE username = '".$_COOKIE['testusername']."'";
$result5 = mysqli_query($mysqli, $sql5);
$row5 = mysqli_fetch_array($result5);
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

if (isset($_POST['f1'])) {
  setcookie("siu","");
  header('Location: https://weunderstand.ru/friends.php');
}
if (isset($_POST['f2'])) {
  setcookie("siu","");
  header('Location: https://weunderstand.ru/allusers.php');
}
if (isset($_POST['f3'])) {
  setcookie("siu","");
  header('Location: https://weunderstand.ru/map1.php');
}









if ($_COOKIE['siu']) {
  $ch = 1;
   $uu = $_COOKIE['siu'];

   if (isset($_POST['sib'])) {
    setcookie("more",$uu);
    setcookie("siu","");
    header("Location: https://weunderstand.ru/search.php");
  }

  $sql3 = "SELECT gender From users WHERE username = '".$uu."'";
  $result3 = mysqli_query($mysqli, $sql3);
  $row3 = mysqli_fetch_row($result3);
  $value = $row3[0];

  $sql4 = "SELECT online From users WHERE username = '".$uu."'";
  $result4 = mysqli_query($mysqli, $sql4);
  $row4 = mysqli_fetch_row($result4);
  $isonline = $row4[0];

  $sql5 = "SELECT volunteer From users WHERE username = '".$uu."'";
  $result5 = mysqli_query($mysqli, $sql5);
  $row5 = mysqli_fetch_row($result5);
  $isvolunteer = $row5[0];

  if ($value == "Мужской") {
    $gender = "images/avatar1.png";
  }
  else if ($value == "Женский") {
    $gender = "images/avatar2.jpg";
  }
  else {
    $gender = "images/avatar3.png";
  }

  if ($isonline == 'yes') {
    $online = '#2ade2a';
  }
  else {
    $online = 'grey';
  }


  if ($isvolunteer == 'no') {
    $volt = 'hidden';
  }
  else {
    $volt = 'visible';
  }

  $aa = "<div class='col-lg-2 justify-content-center d-flex' id='sometest' style='margin-left: 50px;'>
                <div class='text-center card-box'>
                  <div class='member-card' >
                    <div class='thumb-lg member-thumb mx-auto glx_img ''>
                      <img class='rounded-circle img-thumbnail center-block img-responsive img-thumbnail thumb96 mt' src='$gender'>
                    </div>
                    <span  class='inline'><i class='fa fa-user' style='color: $online;'></i></span>
                    <span  class='inline'><h4 class='pb' id='login'>$uu</h4></span>
                    <p style='visibility: $volt;' >( Волонтёр )</p>
                    <form method='post'>
                    <button type='submit' name='sib' class='btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light'>Подробнее</button>
                    </form>
                  </div>

                </div>

              </div>";
}
else {
  $ch = 0;
  $q = 0;
$array = array();

$sql="SELECT username From users WHERE username != '".$username."' ";
$result=mysqli_query($mysqli, $sql);

if ($result->num_rows) {
    while($rows = $result->fetch_assoc()) {
        foreach ($rows as $key => $value) {
          $array[$q] = $value;
            $q++; 
        } 
    }

} 



for ($i=0; $i < $q ; $i++) { 
  if (isset($_POST["ab".$i])) {
    setcookie("more",$array[$i]);
    header("Location: https://weunderstand.ru/search.php");
  }
}



$arr = array();
$gender = "";
for ($i=0; $i < $q; $i++) { 
  $sql3 = "SELECT gender From users WHERE username = '".$array[$i]."'";
  $result3 = mysqli_query($mysqli, $sql3);
  $row3 = mysqli_fetch_row($result3);
  $value = $row3[0];
  $sql4 = "SELECT online From users WHERE username = '".$array[$i]."'";
  $result4 = mysqli_query($mysqli, $sql4);
  $row4 = mysqli_fetch_row($result4);
  $isonline = $row4[0];
  $sql5 = "SELECT volunteer From users WHERE username = '".$array[$i]."'";
  $result5 = mysqli_query($mysqli, $sql5);
  $row5 = mysqli_fetch_row($result5);
  $isvolunteer = $row5[0];
  if ($value == "Мужской") {
    $gender = "images/avatar1.png";
  }
  else if ($value == "Женский") {
    $gender = "images/avatar2.jpg";
  }
  else {
    $gender = "images/avatar3.png";
  }
  if ($isonline == 'yes') {
    $online = '#2ade2a';
  }
  else {
    $online = 'grey';
  }
  if ($isvolunteer == 'no') {
    $volt = 'hidden';
  }
  else {
    $volt = 'visible';
  }
  $arr[$i] = "<div class='col-lg-2 justify-content-center d-flex' id='sometest' style='margin-left: 50px;'>
                <div class='text-center card-box'>
                  <div class='member-card' >
                    <div class='thumb-lg member-thumb mx-auto glx_img ''>
                      <img class='rounded-circle img-thumbnail center-block img-responsive img-thumbnail thumb96 mt' src='$gender'>
                    </div>
                    <span  class='inline'><i class='fa fa-user' style='color: $online;'></i></span>
                    <span  class='inline'><h4 class='pb' id='login'>$array[$i]</h4></span>
                    <p style='visibility: $volt;' >( Волонтёр )</p>
                    <form method='post'>
                    <button type='submit' name='ab".$i."' class='btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light'>Подробнее</button>
                    </form>
                  </div>

                </div>

              </div>";
}




}





?>



 <!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>WEunderstand</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/allusers.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <style type="text/css">
          .btn-chat{
            visibility: <?php echo $btnchch; ?> ;
          }
      body {
        background-image: linear-gradient(to bottom left, <?php echo $color1; ?>, <?php echo $color2; ?>, <?php echo $color7; ?>, <?php echo $color8; ?>);
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
    background-image: linear-gradient(to bottom right, #136a8a, #267871);
    width: 80px;
    margin-right: 7px;
  }
   .color2 {
    background-image: linear-gradient(to bottom right, #42275a, #734b6d);
    width: 80px;
    margin-right: 7px;
  }
   .color3 {
    background-image: linear-gradient(to bottom right, #2193b0, #6dd5ed);
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
.searchbar > .search_icon {
  background-color: <?php echo $color2; ?>;
}
::placeholder {
  color: <?php echo $color2; ?>;
}


#fr1 button {
  background: transparent;
  color: white;
  border: none;
}

#fr2 button {
  background: transparent;
  color: white;
  border: none;
} 
#fr3 button {
  background: transparent;
  color: white;
  border: none;
} 
.ab {
  color: white;
  background-color: #2e7ef6;
  border: 2px solid #2e7ef6;
  border-radius: 25px;
  padding: 5px;
}
.ab:hover {
  cursor: pointer;
}

    </style>

	</head>

	<body>
		<header>
    <div class="container">
        <div class="row">
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
    <form id="srchid" action="" method="post">            
      <div class="content">
                <div class="container">
                    <div class="row" id="srch">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="searchbar">
                              <input class="search_input" type="text" name="siu" placeholder="Поиск..." >
                              <button id="srbtid" type="submit" name="search_sbm" class="search_icon">
                              <i class="fas fa-search"></i>
                              </button>        
                            </div>
                         </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-10 center d-flex justify-content-center">
                        <form action="" method="post">
                          <ul class="fr">
                          <li id="fr1"><button type="submit" name="f1">Мои друзья</button></li>
                          <li id="fr2"><button type="submit" name="f2">Все пользователи</button></li>
                          <li id="fr3"><button type="submit" name="f3">Карта волонтеров</button></li>
                        </ul>
                        </form>
                      </div>
                    </div>
                    <div class="row d-flex justify-content-center centt" id="r1"> 
                        <?php
                        if ($ch == 0) {
                         for ($i=0; $i < $q; $i++) { 
                           echo $arr[$i];
                         }
                        }
                        else {
                          echo $aa;
                        }
                          
                         ?> 
                    </div>      
                </div>     
             </div>
             </form>    

		</main>



	<script type="text/javascript" src="js/script.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>

</html>
