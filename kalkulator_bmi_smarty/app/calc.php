<?php
require_once dirname(__FILE__).'/../config.php';
include(dirname(__FILE__).'/../libs/Smarty.class.php');

function getParams(&$x,&$y,&$plec,&$wiek){
    $x = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
	$y = isset($_REQUEST['y']) ? $_REQUEST['y'] : null; 
	$plec = isset($_REQUEST['plec']) ? $_REQUEST['plec'] : null;
	$wiek = isset($_REQUEST['wiek']) ? $_REQUEST['wiek'] : null;	   
}

function validate(&$x,&$y,&$plec,&$wiek,&$messages){
if ( ! (isset($x) && isset($y) && isset($plec))) {
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów';
}

if ($wiek == '1') {
	$messages [] = 'Nie wybrano przedziału wiekowego';
}
 if (! isset($plec) == '1,2,3') {
	$messages [] = 'Nie wybrano płci';
} 

if ( $x == "") {
	$messages [] = 'Nie podano wagi';
}
if ( $y == "") {
	$messages [] = 'Nie podano wzrostu';
}

if (count ( $messages ) != 0) return false;
	
	if (! is_numeric($y) || $y<0) {
		$messages[] = 'Twoja waga nie jest liczbą dodatnią. Podaj poprawną wartość';
	}
	
	if (! is_numeric($x) || $x<0) {
		$messages[] = 'Twój wzrost nie jest liczbą dodatnią. Podaj poprawną wartość';
	}

	return count ( $messages ) == 0;
}


function process(&$x,&$y,&$plec,&$wiek,&$messages,&$result){

	$x = floatval($x);
	$y = floatval($y);

 if ($wiek == '2'){
	$result = round($x / ($y/100* $y/100),2); }
	else if ($wiek == '3'){
	$result = round($x / (($y/100* $y/100)+0.002),2); } 
	else if ($wiek == '4'){
	$result = round($x / (($y/100* $y/100)+0.004),2); } 
	else if ($wiek == '5'){
	$result = round($x / (($y/100* $y/100)+0.006),2);
	} else {$result = round($x / (($y/100* $y/100)+0.008),2);}
}

$plec = null;
$wiek = null;
$result = null;
$messages = array();

getParams($x,$y,$plec,$wiek);
if (validate($x,$y,$plec,$wiek,$messages)) { 
	process($y,$x,$plec,$wiek,$messages,$result);
}

$smarty = new Smarty(); 

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('plec',$plec);
$smarty->assign('wiek',$wiek);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);

$smarty->display(dirname(__FILE__).'/calc_view.tpl');
