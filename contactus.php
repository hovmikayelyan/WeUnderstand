<?php 

$username = $_COOKIE["testusername"];
$host = "localhost";
$user = "mikayelyan_wu";
$pass = "hov350988";
$dbname = "mikayelyan_wu";

$MyTheme=(isset($_POST["mytheme"]) && !empty($_POST["mytheme"])) ? $_POST["mytheme"] : "default";
$MyName=(isset($_POST["myname"]) && !empty($_POST["myname"])) ? $_POST["myname"] : "default";
$MyEmail=(isset($_POST["myemail"]) && !empty($_POST["myemail"])) ? $_POST["myemail"] : "default";
$MySms=(isset($_POST["mysms"]) && !empty($_POST["mysms"])) ? $_POST["mysms"] : "default";


$fromAddress = "support@weunderstand.ru";
$headers = array();
$headers[] = 'From: "' . $fromAddress . '" <' . $fromAddress . '>';
$headers[] = 'Reply-To: "' . $fromAddress . '" <' . $fromAddress . '>';
$headers[] = 'X-Mailer: PHP v' . phpversion();

$mysqli = mysqli_connect($host,$user,$pass,$dbname);


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 

$sql = "SELECT * From users WHERE username = '".$username."'";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_array($result);

if (isset($_POST["submit"])) {
	mail($fromAddress,$MyTheme  , "From: ".$MyName." / Email: " . $MyEmail . " " . " / Message:  ".$MySms, implode("\r\n", $headers));
	echo '<script type="text/javascript">alert("Спасибо! Ваше сообщение успешно отправлено.");</script>';
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

// ------------------------- MENU BUTTONS ------------------------- //

if (isset($_POST["logout"])) {
  $mysqli->query("UPDATE users SET online='no' WHERE `username`= '".$_COOKIE["testusername"]."' ");
  setcookie("testusername", "");
  header("Location: https://weunderstand.ru/index.php");
}
if (isset($_POST["acc"])) {
  header("Location: https://weunderstand.ru/acc.php");
}
if (isset($_POST["cus"])) {
  header("Location: https://weunderstand.ru/contactus.php");
}
if (isset($_POST["chat"])) {
  header("Location: https://weunderstand.ru/chat.php");
}
if (isset($_POST["service"])) {
  header("Location: https://weunderstand.ru/services.php");
}
if (isset($_POST["friend"])) {
  header("Location: https://weunderstand.ru/friends.php");
}
if (isset($_POST["forum"])) {
  header("Location: https://weunderstand.ru/forum.php");
}
if (isset($_POST["funct"])) {
  header("Location: https://weunderstand.ru/function.php");
}

// ------------------------- END OF MENU BUTTONS ------------------------- //
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
		<link rel="stylesheet" type="text/css" href="css/contactus.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<style type="text/css">
			

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





		</style>
	</head>

	<body>
		<header>
    <div class="container">
        <div class="row">
          <div class="col-lg-2 justify-content-center d-flex">
            <a href="<?php if (!$_COOKIE['testusername']) { echo 'https://weunderstand.ru'; } else { echo '#'; }?>">
              <img src="images/logo1.png" alt="" class="logo">
            </a>
          </div>
          <div class="col-lg-10 d-flex d_menu justify-content-end">
			<form action="" method="post">
           <nav class="lists">
              <ul id="main">
                <li class="task4"><button type="submit" name="funct" id="logout" style="color: white;"><b>ФУНКЦИИ</b></button></li>
              <li class="task4"><button type="submit" name="service" id="logout" style="color: white;"><b>СЕРВИСЫ</b></button></li>
              
              <li class="task4 task44 <?php if (!$_COOKIE['testusername']) {
                echo 'disabled';
              } ?> "><b>Чаты<i class="fa fa-chevron-down"></i></b>
                  <ul class="drop">
                    <div class="task3">
                    <li class="task5"><button type="submit" name="chat" id="logout" style="color: white;"><b>МОИ ЧАТЫ</b></button></li>
                    <li><button type="submit" name="forum" id="logout" style="color: white;"><b>ФОРУМ</b></button></li>

                    
                    </div>
                  </ul>
                </li>
              
              <li class="task4 task44 <?php if (!$_COOKIE['testusername']) {
                echo 'disabled';
              } ?> "><b>Профиль<i class="fa fa-chevron-down"></i></b>
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
			<div class="container contat">
				<div class="row">
					<div class="col-md-3 task1">
			<div class="contact-info">
				<img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
				<h2>Свяжитесь с нами</h2>
				<h4>Мы будем рады Вам помочь !</h4>
			</div>
		</div>
		<div class="col-md-9 task2">
			<form action="" method="post">
				<div class="contact-form">	
					<div class="form-group">
					  <label class="control-label col-sm-2" for="fname">My Theme:</label>
					  <div class="col-sm-10">          
						<input type="text" class="form-control" id="fname" placeholder="* Тема" name="mytheme">
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="lname">Name:</label>
					  <div class="col-sm-10">          
						<input type="text" class="form-control" id="lname" placeholder="* Ваше Имя" name="myname"    value="<?php if ($_COOKIE['testusername']) { echo $row['fullname']; } ?>">
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="email">Email:</label>
					  <div class="col-sm-10">
						<input type="email" class="form-control" id="email" placeholder="* Ваш Email" name="myemail" value="<?php if ($_COOKIE['testusername']) { echo $row['email']; } ?>">
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="comment">Comment:</label>
					  <div class="col-sm-10">
						<textarea class="form-control" rows="5" id="comment" placeholder="Пожалуйста, введите своё сообщение здесь ..." name="mysms"></textarea>
					  </div>
					</div>
					<div class="form-group">        
					  <div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default" name="submit">Отправить!</button>
					  </div>
					</div>
				</div>
			</form>
		</div>
				</div>
			</div>
		</main>
 
	<script type="text/javascript" src="js/script.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>

</html>

