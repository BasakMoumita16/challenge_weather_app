
<?php

if (isset($_POST["submit"])){
	$city = $_POST["cityName"];
$string = "http://api.openweathermap.org/data/2.5/weather?q=".$city."&units=metric&appid=a21c5451c8b02861f30734c35155745c";
$data = json_decode(file_get_contents($string));

};
?> 


<!DOCTYPE html>
<html>
<header>

<head>
                <title>Weather_App</title>
                <meta name ="viewport" content=" width=device-width, initial-scale=1.0">
				<meta charset="utf-8" />
                <link rel="stylesheet" href="./css/style.css">
            
            </head>
</header>
<body>


<center>
	<form method="Post" action="index.php">
	<h1>Type City and Country</h1>
	<br><p>For Example Delhi,in</p>
		<input type="text" name="cityName" required>
		<input type="submit" name="submit">
	</form>
	
</center>

 


<div class="container">
        
			<?php
			if (isset($_POST["submit"])){
            echo "<center><h2>Temparature " .$data->main->temp."°c</h2></center>";
            echo "<center><h2>Cloud ". $data->clouds->all."%</h2></center>"; 
			echo "<center><h2>Humidity ".$data->main->humidity."%</h2></center>";
			echo "<center><h2>Windspeed ".$data->wind->speed."mph </h2></center>";
			};
            ?>
            
        </div> 


</body>
</html>