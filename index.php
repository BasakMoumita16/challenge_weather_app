
<!DOCTYPE html>
<html>

<head>
			<title>Weather_App</title>
			<meta name ="viewport" content=" width=device-width, initial-scale=1.0">
			<meta charset="utf-8" />
			<link rel="stylesheet" href="./css/style.css">
</head>
<body>


<center>
<form method="Post" action="index.php">
<h1>Check Weather</h1>

	<input class= "int" type="text"name="cityName"placeholder="Search City">
	<input class = "btn" type="submit" name="submit">
</form>

</center>


	
<?php
		
if (isset($_POST["submit"])){
$city = $_POST["cityName"];
$string = "http://api.openweathermap.org/data/2.5/forecast?q=".$city."&units=metric&appid=a21c5451c8b02861f30734c35155745c";
$data = json_decode(file_get_contents($string));
echo"<center><div class= 'cityname' ><h2>".$data->city->name."</h2></div></center>" ;
echo "<div class ='container'>";
	
foreach ($data->list as $element) {
	$time = $element->dt_txt;
	$time_space = "$time ";
	$hour = substr($time_space,11,2);
	if($hour == 18){
		echo "<div class= 'item'>";
			
echo"<center><h2> ".date('l', strtotime($element->dt_txt))."</h2></center>";	
echo"<center><h2>Date ".$element->dt_txt."</h2></center>";		
	
echo "<center><h2>Temparature ".$element->main->temp."°c</h2></center>";
echo "<center><h2>Humidity ".$element->main->humidity."%</h2></center>";
echo "<center><h2>Windspeed ".$element->wind->speed."mph </h2></center>";
echo "</div>";

};
}
};
?>


</body>
</html>