<?php
require_once dirname(__FILE__).'/../config.php';
include _ROOT_PATH.'/app/security/check.php';

function getParams(&$x,&$y,&$plec,&$wiek){
    $x = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
	$y = isset($_REQUEST['y']) ? $_REQUEST['y'] : null; 
	$plec = isset($_REQUEST['plec']) ? $_REQUEST['plec'] : null;
	$wiek = isset($_REQUEST['wiek']) ? $_REQUEST['wiek'] : null;	   
}

function validate(&$x,&$y,&$plec,&$wiek,&$messages){
if ( ! (isset($x) && isset($y) && isset($plec))) {
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ($wiek == '1') {
	$messages [] = 'Błąd. Nie wybrano przedziału wiekowego.';
}
 if (! isset($plec) == '1,2,3') {
	$messages [] = 'Błąd. Nie wybrano płci';
} 

if ( $x == "") {
	$messages [] = 'Nie podano wagi';
}
if ( $y == "") {
	$messages [] = 'Nie podano wzrostu';
}

if (count ( $messages ) != 0) return false;
	
	if (! is_numeric($x) || $x<0) {
		$messages[] = 'Twoja waga nie jest liczbą dodatnią. Podaj poprawną wartość';
	}
	
	if (! is_numeric($y) || $y<0) {
		$messages[] = 'Twój wzrost nie jest liczbą dodatnią. Podaj poprawną wartość';
	}

	return count ( $messages ) == 0;
}


function process(&$x,&$y,&$plec,&$wiek,&$messages,&$result){
	global $role; 

	$x = floatval($x);
	$y = floatval($y);

 if ($wiek == '2'){
	$result = round($y / ($x/100* $x/100),2); }
	else if ($wiek == '3'){
	$result = round($y / (($x/100* $x/100)+0.002),2); } 
	else if ($wiek == '4'){
	$result = round($y / (($x/100* $x/100)+0.004),2); } 
	else if ($wiek == '5'){
	$result = round($y / (($x/100* $x/100)+0.006),2);
	} else {$result = round($y / (($x/100* $x/100)+0.008),2);}
}

$waga = null;
$wzrost = null;
$plec = null;
$wiek = null;
$result = null;
$messages = array();

getParams($waga,$wzrost,$plec,$wiek);
if (validate($waga,$wzrost,$plec,$wiek,$messages)) { 
	process($wzrost,$waga,$plec,$wiek,$messages,$result);
}

include 'calc_view.php';
