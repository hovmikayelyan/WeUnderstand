<?php

$username = $_COOKIE["testusername"];



if (!$_COOKIE['testusername']) {
  header("Location: https://weunderstand.ru/index.php");
}




$host = "localhost";
$user = "mikayelyan_wu";
$pass = "hov350988";
$dbname = "mikayelyan_wu";

$fullname = (isset($_POST["fullname"]) && !empty($_POST["fullname"])) ? $_POST["fullname"] : "default";
$day = (isset($_POST["day"]) && !empty($_POST["day"])) ? $_POST["day"] : "default";
$month = (isset($_POST["month"]) && !empty($_POST["month"])) ? $_POST["month"] : "default";
$year = (isset($_POST["year"]) && !empty($_POST["year"])) ? $_POST["year"] : "default";
$gender = (isset($_POST["gender"]) && !empty($_POST["gender"])) ? $_POST["gender"] : "default";
$phone = (isset($_POST["phone"]) && !empty($_POST["phone"])) ? $_POST["phone"] : "default";
$password = (isset($_POST["password"]) && !empty($_POST["password"])) ? $_POST["password"] : "default";
//$address = (isset($_POST["address"]) && !empty($_POST["address"])) ? $_POST["address"] : "default";
$color = (isset($_POST["color"]) && !empty($_POST["color"])) ? $_POST["color"] : "default";
$mysqli = mysqli_connect($host,$user,$pass,$dbname);


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 

$sql = "SELECT * From users WHERE username = '".$username."'";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_array($result);

if (isset($_POST["submit"])) {
  $mysqli->query("UPDATE users SET fullname='$fullname',phone='$phone', day='$day', month='$month', year='$year', password='$password', gender='$gender', color='$color' WHERE `username`= '".$username."' ");
  header("Refresh:0");
}


if ($row['gender'] == "Мужской") {
  $avatar = "images/avatar1.png";
}
elseif ($row['gender'] == "Женский") {
  $avatar = "images/avatar2.jpg";
}
else {
  $avatar = "images/avatar3.png";
}

if ($row["month"] == "Январь") {
    $month1 = "01";
}
elseif ($row["month"] == "Февраль") {
     $month1 = "02";
}
elseif ($row["month"] == "Март") {
     $month1 = "03";
}
elseif ($row["month"] == "Апрель") {
     $month1 = "04";
}
elseif ($row["month"] == "Май") {
     $month1 = "05";
}
elseif ($row["month"] == "Июнь") {
     $month1 = "06";
}
elseif ($row["month"] == "Июль") {
     $month1 = "07";
}
elseif ($row["month"] == "Август") {
     $month1 = "08";
}
elseif ($row["month"] == "Сентябрь") {
     $month1 = "09";
}
elseif ($row["month"] == "Октябрь") {
     $month1 = "10";
}
elseif ($row["month"] == "Ноябрь") {
     $month1 = "11";
}
else {
    $month = "12";
}

 function ageCalculator($dob){
    if(!empty($dob)){
        $birthdate = new DateTime($dob);
        $today   = new DateTime('today');
        $age = $birthdate->diff($today)->y;
        return $age;
    }else{
        return 0;
    }
}
$dob = $row["year"] . "-" . $month1 . "-" . $row["day"];
$age = ageCalculator($dob); 



if (isset($_POST["submit5"])) {
  $mysqli->query("DELETE FROM users WHERE username='".$username."' ");
  header("Location: https://weunderstand.ru/index.php");
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



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <title>WEunderstand</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/account11.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=<068280b9-0999-44f1-a767-f594ac438ad1>" type="text/javascript"></script>
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
  .rd {
    margin-left: 5px;
    vertical-align: middle;
  }
  
  .savebut {
    background-color:  <?php echo $color1; ?>;
    color: white;
  } 
  .savebut:hover {
    background-color: white;
    color: <?php echo $color1; ?>;
    border: 1px solid <?php echo $color1; ?>;
  }
	.modal-body {
		background-image: linear-gradient(to bottom right, <?php echo $color1; ?>, <?php echo $color2; ?>);
	}
	
	.bd {
		background-color:  <?php echo $color1; ?>;
    	color: white;
	}
	.bd:hover {
		background-color: white;
    	color: <?php echo $color1; ?>;
    	border: 1px solid <?php echo $color1; ?>;
	}
  .notif {
    display: inline-block;
  }
  .belladona:hover{
    color:#D6C700;
  }
  .not {
    border: none;
    background-color: transparent;
    color: white;
    font-size: 25px;
    margin-right: 50px;
  }
  .lists {
    display: inline-block;
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
        <div class="notif">
          <button type="submit" name="notification" class="fa fa-bell not  belladona"></button>
        </div>
        
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
  <section class="section1">
    <div class="container">
      <div class="row">
          <div class="col-md-4">
              <div class="panel panel-default white">
                  <div class="panel-body text-center">
                      <div class="pv-lg"><img class="center-block img-responsive rounded img-thumbnail thumb96 mt" src="<?php echo $avatar;  ?>" alt="Contact"></div>
                       <h3 class="m0 text-bold mt" id="fullname"><?php echo $row['fullname']; ?></h3>
                       <p <?php if ($row['volunteer'] == "no"){ echo 'style="display:none;"'; } ?>>( Волонтёр )</p>
                      <div class="mv-lg loginuser">
                          <span><i class="fa fa-user" <?php if ($row['online'] == "yes"){ echo 'style="color: #2ade2a;"'; } else { echo 'style="color: grey;"'; } ?>></i></span>
                          <span><h4 class="pb" id="login"><?php echo $row['username']; ?></h4></span>
                      </div>
                      <div class="mv-lg loginuser">
                          <span><i class="fa fa-birthday-cake"></i></span>
                          <span><h5 class="pb" id="login"><?php echo $age; ?></h5></span>
                          <span><i class="fa fa-venus-mars"></i></span>
                          <span><h5 class="pb" id="login"><?php echo $row['gender']; ?></h5></span>
                      </div>
                        <div class="mv-lg loginuser">
                          <span><i class="fa fa-phone"></i></span>
                          <span><h5 class="pb" id="login"><?php echo $row['phone']; ?></h5></span>
                      </div>
                        <div class="mv-lg loginuser">
                          <span><i class="fa fa-envelope"></i>Email:</span>
                          <span><h5 class="pb" id="login"><?php echo $row['email']; ?></h5></span>
                         </div>
                        <div class="mv-lg loginuser">
                          <span><i class="fa fa-globe"></i>Адрес:</span>
                          <span><h5 class="pb" id="login"><?php echo $row['address']; ?></h5></span>
                          </div>
                  </div>
              </div>
              <div class="panel panel-default hidden-xs hidden-sm white">
                  <div class="panel-heading grey">
                      <div class="text-center text-bold"><h5>Настройки</h5></div>
                  </div>
                  <div class="panel-body">
                    <div class="mv-lg text-center s1" data-toggle="modal" data-target="#deleteAcc">
                      <h5><i class="fa fa-trash del"></i> Удалить аккаунт</h5>
                    </div>
                    <div class="justify-content-center d-flex"><img onclick="tapsos();" style="width: 100px;height: 100px;" src="images/sos.png" alt=""></div>
                  </div>
              </div>
          </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-body white">
                <div class="h4 text-center pt">Контактная информация</div>
                <div class="row pv-lg">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <form class="form-horizontal ng-pristine ng-valid" method="post">
                            <div class="form-group">
                                <div class="input-group">
                  <span class="input-group-addon"><i class="fa  fa-server"></i></span>
                  <input type="text" class="form-control" name="fullname" id="fullname" placeholder="ФИО" value="<?php echo $row['fullname']; ?>">
                </div>
                            </div>
                            <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" disabled class="form-control" name="username" id="username" placeholder="Логин" value="<?php echo $row['username']; ?>">
                </div>
                  </div>
                  <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="email" disabled class="form-control" name="email" id="email" placeholder="Эл. адрес" value="<?php echo $row['email']; ?>">
                </div>
                  </div>
                  <div class="form-group">
                                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="Телефон" value="<?php echo $row['phone']; ?>">
                </div>
                            </div>
                     <div class="form-group">
                                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                  <input type="text" class="form-control" name="address" id="address" placeholder="Адрес" value="<?php echo $row['address']; ?>" data-toggle="modal" data-target="#mymap">
                </div>
                            </div>          
                            <div class="form-group">
                                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Пароль" value="<?php echo $row['password']; ?>">
                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <select class="custom-select" id="day" name="day" value="<?php echo $row['day']; ?>">
                    <option selected value="<?php echo $row['day']; ?>"><?php echo $row['day']; ?></option>
                      <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                    </select>
                    <select class="custom-select" id="month" name="month">
                      <option selected value="<?php echo $row['month']; ?>"><?php echo $row['month']; ?></option>
                      <option value="Январь">Январь</option>
                        <option value="Февраль">Февраль</option>
                        <option value="Март">Март</option>
                        <option value="Апрель">Апрель</option>
                        <option value="Май">Май</option>
                        <option value="Июнь">Июнь</option>
                        <option value="Июль">Июль</option>
                        <option value="Август">Август</option>
                        <option value="Сентябрь">Сентябрь</option>
                        <option value="Октябрь">Октябрь</option>
                        <option value="Ноябрь">Ноябрь</option>
                        <option value="Декабрь">Декабрь</option>
                    </select>
                    <input type="text" name="year" placeholder="Год" class="custom-select" value="<?php echo $row['year']; ?>">
                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group gender">
                  <span class="input-group-addon sp"><i class="fa fa-venus-mars"></i></span>
                  <select class="custom-select" id="gender" name="gender">
                          <option selected value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
                                  <option value="Мужской">Мужской</option>
                                  <option value="Женский">Женский</option>
                                  <option value="Другой">Другой</option>
                    </select>
                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-paint-brush"></i></span>
                    <div class="color1"><input type="radio" name="color" class="rd" value="1" <?php if ($row['color'] == 1) { echo "checked"; } ?> ></div>
                    <div class="color2"><input type="radio" name="color" class="rd" value="2" <?php if ($row['color'] == 2) { echo "checked"; } ?>></div> 
                    <div class="color3"><input type="radio" name="color" class="rd" value="3" <?php if ($row['color'] == 3) { echo "checked"; } ?>></div> 
                    <div class="color4"><input type="radio" name="color" class="rd" value="4" <?php if ($row['color'] == 4) { echo "checked"; } ?>></div> 
                    <div class="color5"><input type="radio" name="color" class="rd" value="5" <?php if ($row['color'] == 5) { echo "checked"; } ?>></div>  
                </div>

                            </div>

                            <div class="form-group d-flex justify-content-center">
                                  <button type="submit" name="submit" class="btn  btn-lg savebut ">Сохранить</button>
                                  
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
  </section>
<div class="modal" tabindex="-1" role="dialog" id="deleteAcc">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        <div class="signup-form"> 
    <form action="" method="post">
    <h2>Вы действительно хотите удалить аккаунт?</h2>


    <div class="form-group bbn">
            <button type="submit" name="submit5" class="btn btn-lg bd">Да</button>
            <button type="button" class="btn btn-lg cl bd"data-dismiss="modal" aria-label="Close">Отменить</button>
        </div>
    </form>
</div>
      </div>
    </div>
  </div>
</div>



<div class="modal" tabindex="-1" role="dialog" id="mymap">
  <div class="modal-dialog md1" role="document">
    <div class="modal-content">
      <div class="modal-body">
      	 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
         </button>
        <div class="sf1"> 
    		<form method="post" id="mf">
    			<h2>Укажите ваш адрес на карте</h2>
					<div class="form-group">
            			<div id="map"></div>
        			</div>
        		<div class="form-group d-flex justify-content-center">
           			<button type="submit" name="submit10" class="btn btn-lg bd">Сохранить</button>
        		</div>
    		</form>
		</div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	function tapsos(){
		alert("Волонтерам были отправлены ваши данные");
	}
</script>

  <script type="text/javascript">
    ymaps.ready(init);
var k="default";
var add="default";
function init() {
    var myPlacemark,
        myMap = new ymaps.Map('map', {
            center: [55.753994, 37.622093],
            zoom: 9
        }, {
            searchControlProvider: 'yandex#search'
        });

    // Слушаем клик на карте.
    myMap.events.add('click', function (e) {
        var coords = e.get('coords');

        // Если метка уже создана – просто передвигаем ее.
        if (myPlacemark) {
            myPlacemark.geometry.setCoordinates(coords);
        }
        // Если нет – создаем.
        else {
            myPlacemark = createPlacemark(coords);
            myMap.geoObjects.add(myPlacemark);
            // Слушаем событие окончания перетаскивания на метке.
            myPlacemark.events.add('dragend', function () {
                getAddress(myPlacemark.geometry.getCoordinates());
            });
        }
        getAddress(coords);
    });

    // Создание метки.
    function createPlacemark(coords) {
        var crd = coords[0] + ", " + coords[1];
        document.cookie = "l1=" + crd;
        return new ymaps.Placemark(coords, {
            iconCaption: 'поиск...'
        }, {
            preset: 'islands#violetDotIconWithCaption',
            draggable: true
        });
    }

    // Определяем адрес по координатам (обратное геокодирование).
    function getAddress(coords) {
        myPlacemark.properties.set('iconCaption', 'поиск...');
        ymaps.geocode(coords).then(function (res) {
            var firstGeoObject = res.geoObjects.get(0);

            myPlacemark.properties
                .set({
                    // Формируем строку с данными об объекте.
                    iconCaption: [
                        // Название населенного пункта или вышестоящее административно-территориальное образование.
                        firstGeoObject.getLocalities().length ? firstGeoObject.getLocalities() : firstGeoObject.getAdministrativeAreas(),
                        // Получаем путь до топонима, если метод вернул null, запрашиваем наименование здания.
                        firstGeoObject.getThoroughfare() || firstGeoObject.getPremise()
                    ].filter(Boolean).join(', '),
                    // В качестве контента балуна задаем строку с адресом объекта.
                    balloonContent: firstGeoObject.getAddressLine()

                });
                k = firstGeoObject.getAddressLine()
                document.cookie = "add=" + k;
                
        });
    }

}


  </script>
  <script type="text/javascript" src="js/script.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

 <?php 
$address = $_COOKIE['add'];
$ll = $_COOKIE['l1'];
$k = "mmm";
 if (isset($_POST["submit10"])) {
  $mysqli->query("UPDATE users SET address='".$address."' WHERE `username`= '".$username."' ");
  $mysqli->query("INSERT INTO map (username, l1) VALUES ('$username', '$ll')");
}
?>


















<?php
$username = $_COOKIE["testusername"];



// if (!$_COOKIE['testusername']) {
//   header("Location: https://weunderstand.ru/index.php");
// }




$host = "localhost";
$user = "mikayelyan_wu";
$pass = "hov350988";
$dbname = "mikayelyan_wu";
$mysqli = mysqli_connect($host,$user,$pass,$dbname);


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 
$sql = "SELECT * From map ";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_array($result);




?>

