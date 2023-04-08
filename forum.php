<?php 

$q=0;
$username = $_COOKIE["testusername"];

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

if (isset($_POST["CR"])) {
	$forumname =(isset($_POST["forumname"]) && !empty($_POST["forumname"])) ? $_POST["forumname"] : "default";
	$sql8 = "CREATE TABLE $forumname (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
      username VARCHAR(30) NOT NULL,
      message TEXT(1024) NOT NULL
      ) ";
      $result8 = mysqli_query($mysqli, $sql8);
	
	setcookie("forumname", $forumname);
	$slq="INSERT INTO forumnames(forumname) VALUES('$forumname')";
	$serult=mysqli_query($mysqli, $slq);

	header("Location: https://weunderstand.ru/forumpage.php");
}
















$namearr=array();

$sql1="SELECT forumname From forumnames ";
$result1=mysqli_query($mysqli, $sql1);

if ($result1->num_rows) {
    while($rows = $result1->fetch_assoc()) {
        foreach ($rows as $key => $value) {
        		$arr[$q] = "<div class='row forum-back '>
				<div class='col-lg-2 vandak justify-content-center'>
					<img src='images/vandak.gif'>
				</div>
				<form method='post'>
				<div class='col-lg-6 forum-baj '>		
					<button class='CRbtn1' name='btt".$q."'><h4>".$value."</h4></button>
				</div>
				</form>
			</div>";
			$namearr[$q]=$value;
            $q++;
        } 
    }

} 

for ($i=0; $i < $q; $i++) {
	if (isset($_POST["btt".$i])) {
		setcookie("forumname",$i);
		header("Location: https://weunderstand.ru/forumpage.php");
	} 
}









?>



 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/forum.css">
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




  .CRbtn{
  	background: transparent;
  	color: white;
  	border: none;
  }
  .CRbtn1{
  	background: transparent;
  	color: #7383a4;;
  	border: none;
  	width: max-content;
  }
  .CRbtn1:hover{
  	text-decoration: underline;

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
			<div class="row">
				<div class="col-lg-2">
				    <h1 align="left">Форумы</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 d-flex justify-content-center">
				<div class="h-forum-desc">
					 <p>Форум WEunderstand - это сообщество пользователей на платформе. Если Вам необходима помощь или совет, мы с радостью поможем Вам.</p>
					 <!-- <ul>
						 <li>Menq sirun enq ev petq e m tatsel aystexi hamar grvox ruseren text</li>
						 <li>Es shat em sirum Hovhannes Mikayelyanin</li>
						 <li>Bareeeeeeeeeeeeeeev ov aaaaaaaa?</li>
						 <li>Valodnaaaaaaaaaaaaaaaaaaaaaaaaaa</li>
					 </ul> -->
					 </div>
					</div>
			</div>
			<!-- <div class="row">
				 	<div class="col-lg-12 osnovnie">
				 		<div class="osnovnie">
				 			<h4 style="color: white;">Основное</h4>
				 		</div>
				 	</div>
			</div> 


			<div class="row forum-back ">
				<div class="col-lg-2 vandak justify-content-center">
					<img src="images/vandak.gif">
				</div>
				<div class="col-lg-6 forum-baj ">
					<a href="#"><h4>Вопросы от новичков</h4></a>
					
				</div>
			</div> -->
			<div class="row backcl ">
				 	<div class="col-lg-9 osnovnie">
				 		<div class="osnovnie">
				 			<h4 style="color: white;">Все темы</h4>
				 		</div>
				 	</div>
				 	<div class="log-lg-3 justify-content-end osnovnie">
				 		<button class="CRbtn" data-toggle="modal" data-target="#CRforum"><h5 class="osnovnie" style="color: white;">* Создать новую тему</h5></button>
				 	</div>
			</div> 
			<?php for ($i=0; $i < $q; $i++) { 
                                		echo $arr[$i];
                                	} ?> 
		</div>
	</main>







<div class="modal" tabindex="-1" role="dialog" id="CRforum">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        		</button>
        <div class="signup-form">	
    <form action="" method="post">
		<h4 style="color: black">Создать новую тему</h4>
		 
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input type="text" class="form-control" name="forumname" placeholder="Название темы" required="required">
			</div>
        </div>
        
          
		<div class="form-group">
            <button type="submit" name="CR" class="btn btn-primary btn-block btn-lg">Создать</button>
        </div>
    </form>
</div>
      </div>
    </div>
  </div>
</div>




	<script type="text/javascript">
		
	function setcook0() {
    	var name = document.getElementById("name0");
    	var cook = name.innerText;
    	document.cookie = "su=" + cook + "";
     	
    };

	</script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>