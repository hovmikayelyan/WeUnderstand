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

$q = 0;
$array = array();

$sql="SELECT friend From friend WHERE username = '".$username."' ";
$result=mysqli_query($mysqli, $sql);
$sql1 = "SELECT username From friend WHERE friend = '".$username."' ";
$result1=mysqli_query($mysqli, $sql1);
if ($result->num_rows || $result1->num_rows) {
    while($rows = $result->fetch_assoc()) {
        foreach ($rows as $key => $value) {
          $array[$q] = $value;
            $q++; 
        } 
    }
    while($rows = $result1->fetch_assoc()) {
        foreach ($rows as $key => $value) {
          $array[$q] = $value;
            $q++; 
        } 
    }

}



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




for ($i=0; $i < $q ; $i++) { 
  if (isset($_POST["btn-chat".$i])) {
    setcookie("su",$array[$i]);
    setcookie("su",$array[$i]);
    $sql6="SELECT username From chat WHERE myusername = '".$_COOKIE['testusername']."' AND username = '".$array[$i]."'";
    $result6 = mysqli_query($mysqli, $sql6);
    $sql20="SELECT username From chat WHERE myusername = '".$array[$i]."' AND username = '".$_COOKIE['testusername']."'";
    $result20 = mysqli_query($mysqli, $sql20);
    if (!mysqli_num_rows($result6) && !mysqli_num_rows($result20)) {
      setcookie("su",$array[$i]);
      $allu = $username . "_" . $array[$i];
      $allu1 = $array[$i] . "_" . $username;
      $sqll2="INSERT INTO chat(myusername, username) VALUES('$username','$array[$i]')";
      $resultt2 = mysqli_query($mysqli, $sqll2);
      $sql_u = "SELECT * FROM $allu";
      $sql_e = "SELECT * FROM $allu1";
      $res_u = mysqli_query($mysqli, $sql_u);
      $res_e = mysqli_query($mysqli, $sql_e);
      if ($res_u == false && $res_e == false) {
        $sql15 = "CREATE TABLE $allu (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        username VARCHAR(30) NOT NULL,
        message TEXT(1024) NOT NULL
        ) ";
        $result15 = mysqli_query($mysqli, $sql15);
      }   
    }
    header('Location: https://weunderstand.ru/chat.php');
  }
}

for ($i=0; $i < $q ; $i++) { 
  if (isset($_POST["del".$i])) {
    $sql14 = "DELETE FROM friend WHERE friend = '".$array[$i]."' AND username = '".$username."'  ";
    $result14 = mysqli_query($mysqli, $sql14);
    $sql18 = "DELETE FROM friend WHERE friend = '".$username."' AND username = '".$array[$i]."'  ";
    $result18 = mysqli_query($mysqli, $sql18);
    header("Refresh:0");
  }
}

if (isset($_POST['f1'])) {
  header('Location: https://weunderstand.ru/translater.php');
}
if (isset($_POST['f2'])) {
  header('Location: https://weunderstand.ru/translaterr.php');
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



 ?>



 <?php 
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

                <form method='post'>
                <button type='submit' class='close'  aria-label='Close' name='del".$i."'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                <div class='text-center card-box'>
                
                  <div class='member-card' >
                    <div class='thumb-lg member-thumb mx-auto glx_img' style='margin-bottom: 10px;''>
                      <img class='rounded-circle img-thumbnail center-block img-responsive img-thumbnail thumb96 mt' src='$gender'>
                    </div>
                    <span  class='inline'><i class='fa fa-user' style='color: $online;'></i></span>
                    <span  class='inline'><h4 class='pb' id='login'>$array[$i]</h4></span>
                    <p style='visibility: $volt;' >( Волонтёр )</p>
                    <form method='post'>
                    <button type='submit' class='btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light btn-chat' name='btn-chat".$i."'>Начать чат</button>
                    </form>
                  </div>

                </div>
                </form>
              </div>";
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
		<link rel="stylesheet" type="text/css" href="css/transl.css">
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
.searchbar > .search_icon {
  background-color: <?php echo $color2; ?>;
}
::placeholder {
  color: <?php echo $color2; ?>;
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
#fr4 button {
  background: transparent;
  color: white;
  border: none;
}


.close {
  margin: 20px 5px 0px 0px;
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
                  <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center" style="color: white;font-size: 50px;">Трансформация</div>
                  </div>
                    <div class="row" id="srch">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="searchbar">
                              <input class="search_input" type="text" name="su" placeholder="Поиск..." >
                              <button id="srbtid" type="submit" name="search_sbm" class="search_icon">
                              <i class="fas fa-search"></i>
                              </button>        
                            </div>
                         </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12 center d-flex justify-content-center">
                        <form action="" method="post">
                          <ul class="fr unlist">
                          <li id="fr2"><button type="submit" name="f2"><i class="fa fa-text-width"></i> Текст -> Язык жестов <i class="fa fa-american-sign-language-interpreting"></i></button></li>
                          <li id="frmarker"><button type="submit" name="f1"><i class="fa fa-american-sign-language-interpreting"></i> Язык жестов -> Текст <i class="fa fa-text-width"></i></button></li>
                        </ul>
                        </form>
                      </div>
                    </div>
  
                </div>     
             </div>
              <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center card-box">
                    <div class="member-card pt-2 pb-2">
                        <div class="thumb-lg member-thumb mx-auto"><i class="fa fa-sign-language" style="font-size: 60px;"></i></div>
                        <div class="">
                            <h4>Пока эта функция находится на стадии разработки<i class="fa fa-frown-o"></i></h4>
                        </div>
                    
                    </div>
                </div>
            </div>
            <!-- end col -->
      
            <!-- end col -->
        
            <!-- end col -->
        </div>
        <!-- end row -->
        
    </div>  
             </form>    

		</main>
	<script type="text/javascript" src="js/script.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>

</html>
