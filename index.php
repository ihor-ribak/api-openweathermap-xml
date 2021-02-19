<?php

include 'functions.php';
template_header('Погода');
echo "<br><h1>Прогноз погоди на сьогодні:</h1>";
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $city = (empty($_POST['city']))? "Chernivtsi" : $_POST['city'];
    $units = 'metric';
    $mode ='xml';
    $id = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
    $request = 'http://api.openweathermap.org/data/2.5/weather?'.
        'q='.$city.'&units='.$units.'&mode='.$mode.'&APPID='.$id;

    $xml = simplexml_load_file($request) or die('Неможливо загрузити дані!');
    $icon = 'http://openweathermap.org/img/w/'.$xml->weather['icon'].'.png';
    echo '<h1>Сьогодні в місті '.$xml->city['name'];
    echo ': '.$xml->weather[''].'<img src='.$icon.'></h1>';
    echo '<ul><li>Температура: '.$xml->temperature['value'];
    echo '&deg; '.$xml->temperature[''].' C';
    echo '<li>Вітер: '.$xml->wind->speed['value'].' м/с';
    echo '<li>Влажність: '.$xml->humidity['value'].'&#37;</ul><br>';
}

echo '<form method="POST" action="index.php">';
echo '<fieldset><legend>Введіть назву міста</legend>';
echo '<input type="text" name="city">';
echo '<input type="submit" name="submission" value = "Прогноз">';
echo '</fieldset></form>';
template_footer();
?>
