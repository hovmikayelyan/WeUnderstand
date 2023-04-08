<?php

$username =(isset($_POST["username"]) && !empty($_POST["username"])) ? $_POST["username"] : "default";
$password =(isset($_POST["password"]) && !empty($_POST["password"])) ? $_POST["password"] : "default";
$username1 =(isset($_POST["username1"]) && !empty($_POST["username1"])) ? $_POST["username1"] : "default";
$password1 =(isset($_POST["password1"]) && !empty($_POST["password1"])) ? $_POST["password1"] : "default";
$fullname =(isset($_POST["fullname"]) && !empty($_POST["fullname"])) ? $_POST["fullname"] : "default";
$email =(isset($_POST["email"]) && !empty($_POST["email"])) ? $_POST["email"] : "default";
$volunteer =(isset($_POST["volunteer"]) && !empty($_POST["volunteer"])) ? "yes" : "no";
$pin = rand(1000,9999);
$pin1 = rand(1000,9999);
$vcallid=rand(10000000,99999999);
$tiv = 0;

$host = "localhost";
$user = "mikayelyan_wu";
$pass = "hov350988";
$dbname = "mikayelyan_wu";

$fromAddress = "support@weunderstand.ru";
$headers = array();
$headers[] = 'From: "' . $fromAddress . '" <' . $fromAddress . '>';
$headers[] = 'Reply-To: "' . $fromAddress . '" <' . $fromAddress . '>';
$headers[] = 'X-Mailer: PHP v' . phpversion();

$mysqli = mysqli_connect($host,$user,$pass,$dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 


if (isset($_POST["submit1"])) {
	$sql = "SELECT  `username` FROM `users` WHERE `username`='".$username1."'";
	$sql1 = "SELECT  `email` FROM `users` WHERE `email`='".$email."'";
	$result = $mysqli->query($sql);
	$result1 = $mysqli->query($sql1);
	if($result->num_rows >= 1) {
		echo '<script type="text/javascript">alert("Пользователь с таким логином уже зарегистрирован!");</script>';
	} 
	elseif ($result1->num_rows >= 1) {
		echo '<script type="text/javascript">alert("Пользователь с таким адресом электронной почты уже зарегистрирован!");</script>';
	}
	else {
 	$mysqli->query("INSERT INTO users (id, fullname, username, email, password, volunteer, tiv, pin, phone, day, month, year, gender, address, color,callid) VALUES ('', '$fullname', '$username1', '$email', '$password1', '$volunteer', '$tiv', '$pin', 'Телефон', '01', 'Январь', '2001', 'Пол', 'Адрес', '1', '$vcallid')");
	 mail($email,"WEunderstand", "Пин код для подтверждения регистрации:" . $pin . " ", implode("\r\n", $headers));
	}

	 
}




if (isset($_POST["submit"])) {
	setcookie("testusername", $username);
	$sql = "SELECT  `username` FROM `users` WHERE `username`='".$username."'";
	$result = $mysqli->query($sql);
	$sql1 = "SELECT  `password` FROM `users` WHERE `password`='".$password."'";
 	$result1 = $mysqli->query($sql1);
 		if ($result->num_rows >= 1 && $result1->num_rows >= 1) {
 			$mysqli->query("UPDATE users SET online='yes' WHERE `username`= '".$username."' ");
 			$sql4 = "SELECT  `tiv` FROM `users` WHERE `username`='".$username."' and `tiv` = '0' ";
			$result4 = $mysqli->query($sql4);
				if ($result4->num_rows >= 1) {
 					header("Location: https://weunderstand.ru/first.php"); 
 				}
 				else {
 					
 					header("Location: https://weunderstand.ru/acc.php");
 				}
 		}
		else {
			echo '<script type="text/javascript">alert("Указан неверный логин или пароль");</script>';
		}
}

if (isset($_POST["submitpas"])) {
	$email1 =(isset($_POST["email1"]) && !empty($_POST["email1"])) ? $_POST["email1"] : "default";
	setcookie("testemail", $email1);
	setcookie("testpin", $pin1);
	setcookie("ifpin", "yes");
	mail($email1,"WEunderstand", "Пин код для восстановление пароля:" . $pin1 . " ", implode("\r\n", $headers));
	header("Location: https://weunderstand.ru/first.php");
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



 if (isset($_POST["plslog"])) {
	    echo '<script language="javascript">';
    echo 'alert("Необходимо войти в аккаунт WEunderstand")';
    echo '</script>';
}

 if (isset($_POST["lite"])) {
	header("Location: https://weunderstand.ru/");
}
?>


<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>WEunderstand</title>
		<link href="https://fonts.googleapis.com/css?family=Monoton&display=swap" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="fonts/NewZelek.ttf" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
		<link rel='icon' href='images/icon.ico' type='image/x-icon'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<style type="text/css">
		.title{
			font-family: 'Monoton', cursive;
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


  .light1 {
  	margin-top: 130px;
  }
  .light:hover {
  	text-decoration: underline;
  	cursor: pointer;
  }

.light {
	background: transparent;
	color: white;
	border: none;
	font-size: 25px;
}





</style>
	</head>

	<body>
		<header class="header">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 center d-flex justify-content-center">
						<a href="<?php if (!$_COOKIE['testusername']) { echo 'http://weunderstand.ru'; } else { echo '#'; }?>"><img src="images/logo.png" alt="" class="logo"></a>
					</div>
				</div>
				<div class="row">
					<div class="d_menu col-lg-12 center d-flex justify-content-center">
						<form action="" method="post">
						<ul class="menu">
							<li><button type="submit" name="plslog" style="background: transparent;color: white;border: none;">Функции</button></li>
							<li><a href="http://weunderstand.ru/services.php">Сервисы</a></li>
							<li><a href="http://weunderstand.ru/contactus.php">Контакты</a></li>
						</ul>
						</form>	
					</div>
				</div>
				<div class="row tit">
					<div class="col-lg-12 d-flex justify-content-center">
						<h1 class="title">WEunderstand</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 d-flex justify-content-center">
							<div class="button "> <b> Начать </b></div>
  								<div class="social " data-toggle="modal" data-target="#logIn">
  									<a href="#">Войти</a>
  								</div>
  								<div class="social" data-toggle="modal" data-target="#signUp">
  									<a href="#">Зарегистрироваться</a>									
  								</div>
  								
  						</div>
					</div> 		
				<div class="row light1">
					<div class="col-lg-8 d-flex justify-content-center center">
						<form action="" method="post">
							<button type="submit" class="light" name="lite">Открыть простую версию сайта</button>
						</form>
						
					</div>
				</div>
				</div>
			
				
		</header>
<div class="modal" tabindex="-1" role="dialog" id="signUp">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        		</button>
        <div class="signup-form">	
    <form action="" method="post">
		<h2>Регистрация</h2>
		 <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa  fa-server"></i></span>
				<input type="text" class="form-control" name="fullname" id="fullname" placeholder="ФИО" required="required">
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input type="text" class="form-control" name="username1" id="username1" placeholder="Логин (мин. 3 символа)" required="required" maxlength="10" pattern=".{3,}">
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
				<input type="email" class="form-control" name="email" id="email" placeholder="Эл. адрес" required="required">
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input type="password" class="form-control" name="password1" id="password1" placeholder="Пароль (мин. 6 символов)" required="required" pattern=".{6,}">
			</div>
        </div>
        <div class="form-group form-check">
        	<input type="checkbox" class="finput" name="volunteer" id="volunteer">
			<span class="valantyor"> Зарегистрироваться как волонтёр</span>
        </div>        
		<div class="form-group">
            <button type="submit" name="submit1" class="btn btn-primary btn-block btn-lg" >Зарегистрироваться</button>
        </div>
        <div class="form-group">
            <a href="" data-toggle="modal" data-target="#logIn" data-dismiss="modal">Уже есть аккаунт?</a>

        </div>
    </form>
</div>
      </div>
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="logIn">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        		</button>
        <div class="signup-form">	
    <form action="" method="post">
		<h2>Вход</h2>
		 
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input type="text" class="form-control" name="username" placeholder="Логин" required="required">
			</div>
        </div>
        
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input type="password" class="form-control" name="password" placeholder="Пароль" required="required">
			</div>
        </div>
          <div class="form-group form-check">
			<a href="" class="valantyor" data-toggle="modal" data-target="#pas" data-dismiss="modal"> Забыли пароль?</a>
        </div> 
		<div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block btn-lg">Войти</button>
        </div>
    </form>
</div>
      </div>
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="pas">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        		</button>
        <div class="signup-form">	
    <form action="" method="post">
		<h2>Восстановление пароля</h2>
        
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
				<input type="email" class="form-control" name="email1" id="email1" placeholder="Эл. адрес" required="required">
			</div>
        </div>
		<div class="form-group">
            <button type="submit" name="submitpas" class="btn btn-primary btn-block btn-lg">Восстановить</button>
        </div>
    </form>
</div>
      </div>
    </div>
  </div>
</div>
	<script type="text/javascript" src="js/script.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>

</html>




 