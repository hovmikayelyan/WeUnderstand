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

$array = array();
// $sql1="SELECT l1 From map";
// $result1=mysqli_query($mysqli, $sql1);

// if ($result1->num_rows) {
//     while($rows = $result1->fetch_assoc()) {
//         foreach ($rows as $key => $value) {
//             $array[$q] = $value;
//             $q++;
//         } 
//     }

// } 

$sql = "SELECT * From map ";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_array($result);




?>

<!DOCTYPE html>
<html>
<head>
    <title>Добавление метки на карту</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--
        Укажите свой API-ключ. Тестовый ключ НЕ БУДЕТ работать на других сайтах.
        Получить ключ можно в Кабинете разработчика: https://developer.tech.yandex.ru/keys/
    -->
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=<ваш API-ключ>" type="text/javascript"></script>
    <script src="placemark.js" type="text/javascript"></script>
    <style>
        html, body, #map {
            width: 100%; height: 100%; padding: 0; margin: 0;
        }
    </style>
</head>
<body>
    <div id="map"></div>
    <script type="text/javascript">
        ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map("map", {
            center: [55.76, 37.64],
            zoom: 10
        }, {
            searchControlProvider: 'yandex#search'
        }),

    // Создаем геообъект с типом геометрии "Точка".
        myGeoObject = new ymaps.GeoObject({
            // Описание геометрии.
            geometry: {
                type: "Point",
                coordinates: [55.8, 37.8]
            },
            // Свойства.
            properties: {
                // Контент метки.
                iconContent: 'Я тащусь',
                hintContent: 'Ну давай уже тащи'
            }
        }, {
            // Опции.
            // Иконка метки будет растягиваться под размер ее содержимого.
            preset: 'islands#blackStretchyIcon',
            // Метку можно перемещать.
            draggable: true
        }),
        myPieChart = new ymaps.Placemark([
            55.847, 37.6
        ], {
            // Данные для построения диаграммы.
            data: [
                {weight: 8, color: '#0E4779'},
                {weight: 6, color: '#1E98FF'},
                {weight: 4, color: '#82CDFF'}
            ],
            iconCaption: "Диаграмма"
        }, {
            // Зададим произвольный макет метки.
            iconLayout: 'default#pieChart',
            // Радиус диаграммы в пикселях.
            iconPieChartRadius: 30,
            // Радиус центральной части макета.
            iconPieChartCoreRadius: 10,
            // Стиль заливки центральной части.
            iconPieChartCoreFillStyle: '#ffffff',
            // Cтиль линий-разделителей секторов и внешней обводки диаграммы.
            iconPieChartStrokeStyle: '#ffffff',
            // Ширина линий-разделителей секторов и внешней обводки диаграммы.
            iconPieChartStrokeWidth: 3,
            // Максимальная ширина подписи метки.
            iconPieChartCaptionMaxWidth: 200
        });

    myMap.geoObjects
        .add(new ymaps.Placemark([55.75635362707921, 37.59679440457154], {
            balloonContent: 'Россия, Москва, Мерзляковский переулок, 13',
            iconCaption: 'mikayel'
        }, {
            preset: 'islands#greenDotIconWithCaption'
        }))
        .add(new ymaps.Placemark([55.65429913183381, 37.846368588989264], {
            balloonContent: 'Россия, Московская область, Котельники, 1-й Покровский проезд, 5',
            iconCaption: 'hov'
        }, {
            preset: 'islands#greenDotIconWithCaption'
        }))
        .add(new ymaps.Placemark([55.80507507941251, 37.38863352734376], {
            balloonContent: 'Россия, Московская область, Котельники, 1-й Покровский проезд, 5',
            iconCaption: 'natali'
        }, {
            preset: 'islands#greenDotIconWithCaption'
        }))
        .add(new ymaps.Placemark([55.67035260996657, 37.419114150589], {
            balloonContent: 'Россия, Московская область, Котельники, 1-й Покровский проезд, 5',
            iconCaption: 'test1'
        }, {
            preset: 'islands#greenDotIconWithCaption'
        }))
    }


    </script>
</body>
</html>

