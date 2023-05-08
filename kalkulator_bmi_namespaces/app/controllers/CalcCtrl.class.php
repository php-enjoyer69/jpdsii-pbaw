<?php
namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;

class CalcCtrl {

	private $form;   
	private $result; 

	public function __construct(){
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}

    public function getParams(){
        $this->form->x = getFromRequest('x');
        $this->form->y = getFromRequest('y'); 
        $this->form->plec = getFromRequest('plec');
        $this->form->wiek = getFromRequest('wiek');	   
    }

	public function validate(){
        if ( ! (isset($this->form->x) && isset($this->form->y) && isset($this->form->plec))) {
            getMessages()->addError('Błędne wywołanie aplikacji. Brak jednego z parametrów');
        }
        
        if ($this->form->wiek == '1') {
            getMessages()->addError('Nie wybrano przedziału wiekowego');
        }
         if (! isset($this->form->plec) == '1,2,3') {
            getMessages()->addError('Nie wybrano płci');
        } 
        
        if ( $this->form->x == "") {
            getMessages()->addError('Nie podano wagi');
        }
        if ( $this->form->y == "") {
            getMessages()->addError('Nie podano wzrostu');
        }
        
        if (! getMessages()->isError());
            
            if (! is_numeric($this->form->y) || $this->form->y<0) {
                getMessages()->addError('Twoja waga nie jest liczbą dodatnią. Podaj poprawną wartość');
            }
            
            if (! is_numeric($this->form->x) || $this->form->x<0) {
                getMessages()->addError('Twój wzrost nie jest liczbą dodatnią. Podaj poprawną wartość');
            }
        
            return ! getMessages()->isError();
        }
        
        
        public function process(){

           $this->getParams();
           
           if ($this->validate()) {

            $this->form->x = intval($this->form->x);
			$this->form->y = intval($this->form->y);
			getMessages()->addInfo('Uzupełniono poprawnie');

           if ($this->form->wiek == '2'){
            $this->result->result = round($this->form->y / ($this->form->x/100* $this->form->x/100),2); }
            else if ($this->form->wiek == '3'){
            $this->result->result = round($this->form->y / (($this->form->x/100* $this->form->x/100)+0.002),2); } 
            else if ($this->form->wiek == '4'){
            $this->result->result = round($this->form->y / (($this->form->x/100* $this->form->x/100)+0.004),2); } 
            else if ($this->form->wiek == '5'){
            $this->result->result = round($this->form->y / (($this->form->x/100* $this->form->x/100)+0.006),2);
            } else {$this->result->result = round($this->form->y / (($this->form->x/100* $this->form->x/100)+0.008),2);}

            getMessages()->addInfo('Wykonano obliczenia');

        }

        $this->generateView();

    }

        public function generateView(){
  
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		
		getSmarty()->display('CalcView.tpl');  
 }  

} 