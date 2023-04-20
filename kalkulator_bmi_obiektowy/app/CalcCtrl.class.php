<?php

require_once $conf->root_path.'/libs/Smarty.class.php';
require_once $conf->root_path.'/libs/Messages.class.php';
require_once $conf->root_path.'/app/CalcForm.class.php';
require_once $conf->root_path.'/app/CalcResult.class.php';

class CalcCtrl {

	private $msgs;  
	private $form;   
	private $result; 

	public function __construct(){
		$this->msgs = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}

    public function getParams(){
        $this->form->x = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
        $this->form->y = isset($_REQUEST['y']) ? $_REQUEST['y'] : null; 
        $this->form->plec = isset($_REQUEST['plec']) ? $_REQUEST['plec'] : null;
        $this->form->wiek = isset($_REQUEST['wiek']) ? $_REQUEST['wiek'] : null;	   
    }

	public function validate(){
        if ( ! (isset($this->form->x) && isset($this->form->y) && isset($this->form->plec))) {
            $this->msgs->addError('Błędne wywołanie aplikacji. Brak jednego z parametrów');
        }
        
        if ($this->form->wiek == '1') {
            $this->msgs->addError('Nie wybrano przedziału wiekowego');
        }
         if (! isset($this->form->plec) == '1,2,3') {
            $this->msgs->addError('Nie wybrano płci');
        } 
        
        if ( $this->form->x == "") {
            $this->msgs->addError('Nie podano wagi');
        }
        if ( $this->form->y == "") {
            $this->msgs->addError('Nie podano wzrostu');
        }
        
        if (! $this->msgs->isError());
            
            if (! is_numeric($this->form->y) || $this->form->y<0) {
                $this->msgs->addError('Twoja waga nie jest liczbą dodatnią. Podaj poprawną wartość');
            }
            
            if (! is_numeric($this->form->x) || $this->form->x<0) {
                $this->msgs->addError('Twój wzrost nie jest liczbą dodatnią. Podaj poprawną wartość');
            }
        
            return (! $this->msgs->isError());
        }
        
        
        public function process(){

           $this->getparams();
           
           if ($this->validate()) {

            $this->form->x = intval($this->form->x);
			$this->form->y = intval($this->form->y);
			$this->msgs->addInfo('Uzupełniono poprawnie');

         if ($this->form->wiek == '2'){
            $this->result->result = round($this->form->y / ($this->form->x/100* $this->form->x/100),2); }
            else if ($this->form->wiek == '3'){
            $this->result->result = round($this->form->y / (($this->form->x/100* $this->form->x/100)+0.002),2); } 
            else if ($this->form->wiek == '4'){
            $this->result->result = round($this->form->y / (($this->form->x/100* $this->form->x/100)+0.004),2); } 
            else if ($this->form->wiek == '5'){
            $this->result->result = round($this->form->y / (($this->form->x/100* $this->form->x/100)+0.006),2);
            } else {$result = round($this->form->y / (($this->form->x/100* $this->form->x/100)+0.008),2);}

            $this->msgs->addInfo('Wykonano obliczenia');

        }

        $this->generateView();

    }

        public function generateView(){
            global $conf;

        $smarty = new Smarty(); 
		
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result);
		
		$smarty->display($conf->root_path.'/app/CalcView.html');  
 }  

} 