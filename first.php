<?php

$userpin = (isset($_POST["userpin"]) && !empty($_POST["userpin"])) ? $_POST["userpin"] : "default";
$username = $_COOKIE["testusername"];
$email = $_COOKIE["testemail"];
$pin1 = $_COOKIE["testpin"];
$tiv = 1;
$password1 = (isset($_POST["password1"]) && !empty($_POST["password1"])) ? $_POST["password1"] : "default";
$pinn = (isset($_POST["pinn"]) && !empty($_POST["pinn"])) ? $_POST["pinn"] : "default";

$host = "localhost";
$user = "mikayelyan_wu";
$pass = "hov350988";
$dbname = "mikayelyan_wu";

$mysqli = mysqli_connect($host,$user,$pass,$dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 

if (isset($_POST["submit3"])) {
	$sql4 = "SELECT  `pin` FROM `users` WHERE `username`='".$username."' and `pin`='". ($userpin) ."' ";
	$result4 = $mysqli->query($sql4);
	if ($result4->num_rows >= 1) {
		$mysqli->query("UPDATE users SET tiv='$tiv' WHERE `username`= '".$username."' ");
		header("Location: https://weunderstand.ru/acc.php");
		
	}
	else {
		echo '<script type="text/javascript">alert("Неверный ПИН код");</script>';
	}
}

if (isset($_POST["submit6"])) {
  $sql5 = "SELECT  `username` FROM `users` WHERE `email`='".$email."' ";
  $result5 = $mysqli->query($sql5);
  $row1 = mysqli_fetch_array($result5);
  setcookie("testusername", $row1['username']);
  if ($result5->num_rows >= 1) {
    if ($pinn = $pin1) {
      $mysqli->query("UPDATE users SET password='$password1' WHERE `email`= '".$email."' ");
      $mysqli->query("UPDATE users SET online='yes' WHERE `username`= '".$username."' ");
      header("Location: https://weunderstand.ru/acc.php");
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

?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <title>WEunderstand</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <?php if ($_COOKIE["ifpin"] == "yes") { ?>
    <script type="text/javascript">
        $(window).on('load',function(){
          $('#pas').modal('show');
        });
    </script>
  <?php } else { ?>
    <script type="text/javascript">
        $(window).on('load',function(){
          $('#pin').modal('show');
        });
    </script>
  <?php } ?>  
</head>
<body>
  <header>
     <div class="modal" tabindex="-1" role="dialog" id="pin">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="signup-form"> 
                <form method="post">
                <h2>Подтверждение регистрации</h2>
                    <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" disabled class="form-control" name="username" id="username" placeholder="Логин" value="<?php echo $username; ?>">
                  </div>
                    </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="text" class="form-control" name="userpin" placeholder="Пин код" required="required">
                  </div>
                    </div>
                    <div class="form-group">
                      <p class="pn text-center">Пин код отправлен на ваш адрес эл. почты.</p>
                    </div>
                <div class="form-group">
                        <button type="submit" name="submit3" class="btn btn-primary btn-block btn-lg">Подтвердить</button>
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
                <form method="post">
                <h2>Восстановление пароля</h2>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" disabled class="form-control" name="email1" id="email1" placeholder="Эл. адрес" value="<?php echo $email; ?>">
                      </div>
                    </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="text" class="form-control" name="pinn" placeholder="Пин код" required="required">
                  </div>
                    </div>
                <div class="form-group">
                 <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" name="password1" placeholder="Новый пароль" required="required">
              </div>
                    </div>

                    <div class="form-group">
                      <p class="pn text-center">Пин код отправлен на ваш адрес эл. почты.</p>
                    </div>
                <div class="form-group">
                        <button type="submit" name="submit6" class="btn btn-primary btn-block btn-lg">Сохранить</button>
                    </div>
                </form>
            </div>
              </div>
          </div>
        </div>
    </div>
  </header>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>