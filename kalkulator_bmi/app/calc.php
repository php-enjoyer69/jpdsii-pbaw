<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$x = $_REQUEST ['x'];
$y = $_REQUEST ['y'];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($x) && isset($y))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $x == "") {
	$messages [] = 'Nie podano wagi';
}
if ( $y == "") {
	$messages [] = 'Nie podano wzrostu';
}
if ($_POST['wiek'] == '1') {
	$messages [] = 'Błąd. Nie wybrano przedziału wiekowego.';
}
 if (! isset($_POST['plec']) == '1,2,3') {
	$messages [] = 'Błąd. Nie wybrano płci';
} 

//nie ma sensu walidować dalej gdy brak parametrów
if (empty( $messages )) {
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric($x) || $x<0) {
		$messages[] = 'Twoja waga nie jest liczbą dodatnią. Podaj poprawną wartość';
	}
	
	if (! is_numeric($y) || $y<0) {
		$messages[] = 'Twój wzrost nie jest liczbą dodatnią. Podaj poprawną wartość';
	}	

}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
 if ($_POST['wiek'] == '2'){
	$result = round($x / ($y/100* $y/100),2); } 
	else if ($_POST['wiek'] == '3'){
	$result = round($x / (($y/100* $y/100)+0.002),2); } 
	else if ($_POST['wiek'] == '4'){
	$result = round($x / (($y/100* $y/100)+0.004),2); } 
	else if ($_POST['wiek'] == '5'){
	$result = round($x / (($y/100* $y/100)+0.006),2);
	} else {$result = round($x / (($y/100* $y/100)+0.008),2);}
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result,$bmi)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';
