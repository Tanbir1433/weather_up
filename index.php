<?php
if(array_key_exists('submit',$_GET)){
    if(!$_GET['city']){
       $error = "sorry, Your Input Field is Empty";
    }
    if($_GET['city'])
    {
       $apiData = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$_GET['city']."&appid=1a0c40f3fe216a61cc1d38beeacfdd9e");
       $weather = json_decode($apiData, true);
       
       // C = K - 273.15
       $tempC = $weather['main']['temp'] - 273;
       $tempareture = "<b>".intval($tempC)."&deg;C</b> <br>";
       $cityname = "<b>".$weather['name']."</b>";
       $weathecondition = "<b> Weather Condition : </b>" .$weather['weather']['0']['description']."<br>";
       $atmospric = "<b> Atmosperic Pressure : </b>" .$weather['main']['pressure']."hPa <br>";
       $wind = "<b></b>" .$weather['wind']['speed']."km/h <br>";
       $weatherarray = "<b> Cloudness : </b>" .$weather['clouds']['all']."% <br>";
       $humidity = "<b> </b>" .$weather['main']['humidity']."% <br>";
       date_default_timezone_set('Aisa/Dhaka');
       $sunrise = $weather['sys']['sunrise'];
       $sunrise = "<b>Sunrise : </b>" .date("g:i a",$sunrise)."<br>";
       $currentime = "<b>Current Time : </b>" .date("F , Y, g:i a");
       
    }
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather_App</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="" method="GET">
        <div class="card">
            <div class="search">
                <input type="text" name="city" placeholder="Enter City Name" spellcheck="false">
                <button name="submit"><img src="images/search.png" alt=""></button>
            </div>
            <div class="weather"><br>
                <h1 class="temp"><?php echo $tempareture;?></h1>
                <h2 class="city"><?php echo $cityname;?></h2>
                <div class="details">
                    <div class="col">
                        <img src="images/humidity.png" alt="">
                        <div>
                            <p class="humidity"><?php echo $humidity;?></p>
                            <p>Humidity</p>
                        </div>
                    </div>
                    <div class="col">
                        <img src="images/wind.png" alt="">
                        <div>
                            <p class="wind"><?php echo $wind;?></p>
                            <p>Wind Speed</p>
                        </div>
                    </div>
                </div>
               <div>
               <?php 
                echo "<br>".$weatherarray,$atmospric,$weathecondition,$sunrise,$currentime;
                ?>
               </div>
            </div>
        </div>
    </form>
</body>

</html>