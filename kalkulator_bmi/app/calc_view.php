<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">

<div style="margin: 5px; padding: 60px; border-radius: 50px; background-color: #ffeaf6; width:410px; height:300px;">

<label><span style="color: #ea008d; font-family: 'Comic Sans MS', 'Comic Sans'; font-weight: bold;"> ✧･ﾟ: *✧･ﾟ:* Witaj w kalkulatorze BMI *:･ﾟ✧*:･ﾟ✧</span></label><br/><br/>

<label>Jestem:</label><br>
<label><input type="radio">kobietą</label>
<label><input type="radio">mężczyzną</label>
<label><input type="radio">wolę nie podawać</label></br></br>

<label>Przedział wiekowy: <select>
  <option>Wybierz</option>
  <option>1-15 lat</option>
  <option>16-25 lat</option>
  <option>26-40 lat</option>
  <option>41-60 lat</option>
  <option>60+</option>
</select></label></br></br>

<label for="id_x">Waga w kg: </label>
	<input id="id_x" type="text" name="x" value="<?php if(isset($x)) print($x); ?>" /><br />

	<label for="id_y">Wzrost w cm: </label>
	<input id="id_y" type="text" name="y" value="<?php if(isset($y)) print($y); ?>" /><br /><br/>
	
	<input type="submit" <ol style="background-color:#feffff;" value="Oblicz moje BMI"></ol>
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; margin-left: 37px; padding: 10px 10px 10px 30px; border-radius: 7px; background-color: #f8bade; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; margin-left: 37px; padding: 10px; border-radius: 7px; background-color: #f8bade; width:300px;">
<?php echo 'Wynik: '.$result; 

if($result < 18.5) {
    echo "<br>BMI mniejsze niż 18.5<b><br>Niedowaga</b> ";
  } elseif($result < 25) {
    echo "<br>BMI pomiędzy 18.5 a 25 <b><br> Waga jest w normie</b>";
  } elseif($result < 30) {
    echo "<br>BMI pomiędzy 25 a 30 <b><br> Waga wskazuje na nadwagę</b>";
  } else {
    echo "<br>BMI większe niż 30 <b><br> Otyłość. Skonsultuj się z lekarzem </b>";
  }
?>
</div>
<?php } ?>

</body>
</html>