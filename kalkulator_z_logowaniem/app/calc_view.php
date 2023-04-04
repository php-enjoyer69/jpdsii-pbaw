<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>

<div style="margin: 5px; padding: 60px; border-radius: 50px; background-color: #ffeaf6; width:410px; height:330px;">

<label><span style="color: #ea008d; font-family: 'Comic Sans MS', 'Comic Sans'; font-weight: bold;"> ✧･ﾟ: *✧･ﾟ:* Witaj w kalkulatorze BMI *:･ﾟ✧*:･ﾟ✧</span></label><br/><br/>

<label for="plec">Jestem: <br></label>
<input type="radio" name="plec" id="plec" value="1">kobietą
<input type="radio" name="plec" id="plec" value="2">mężczyzną
<input type="radio" name="plec" id="plec" value="3">wolę nie podawać</br></br>

<label for="id_q">Przedział wiekowy: </label><select name="wiek" id="wiek">
  <option value="1">Wybierz</option>
  <option value="2">1-15 lat</option>
  <option value="3">16-25 lat</option>
  <option value="4">26-40 lat</option>
  <option value="5">41-60 lat</option>
  <option value="6">60+</option>
</select></br></br>

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
    echo "<br>BMI mniejsze niż 18.5 <b><br>Niedowaga</b> ";
  } elseif($result < 25) {
    echo "<br>BMI pomiędzy 18.5 a 25 <b><br> Waga jest w normie</b>";
  } elseif($result < 30) {
    echo "<br>BMI pomiędzy 25 a 30 <b><br> Waga wskazuje na nadwagę</b>";
  } else {
    echo "<br>BMI większe niż 30 <b><br> Otyłość. Skonsultuj się z lekarzem </b>";
  }

	if ($_SESSION['role'] == 'admin'){ //admin ma mozliwosc zobaczyc 3 miejsca po przecinku 
		echo '<br>Dokładniejsza wartość: '.number_format($result, 3, ".", ""); 
	} 
  if ($_SESSION['role'] == 'user'){
  echo '<br>Zostań adminem by zobaczyć dokładniejszą wartość'; }

  
?>
</div>
<?php } ?>

</body>
</html>