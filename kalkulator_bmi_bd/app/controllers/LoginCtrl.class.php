<?php

namespace app\controllers;

use app\transfer\User;
use app\forms\LoginForm;

class LoginCtrl{
	private $form;
	
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new LoginForm();
	}
		
	public function getParams(){
		$this->form->login = getFromRequest('login');
		$this->form->pass = getFromRequest('pass');
	}
	
	public function validate() {
		//nie ma sensu walidować dalej, gdy brak parametrów
		if (!isset($this->form->login)) return false;
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if (empty($this->form->login)) {
			getMessages()->addError('Nie podano loginu');
		}
		if (empty($this->form->pass)) {
			getMessages()->addError('Nie podano hasła');
		}

		if ( !getMessages()->isError() ) {
		
			if ($this->form->login == "admin" && $this->form->pass == "admin") {

				$user = new User($this->form->login, 'admin');
				$_SESSION['user'] = serialize($user);
				addRole($user->role);

			} else if ($this->form->login == "user" && $this->form->pass == "user") {

				$user = new User($this->form->login, 'user');
				$_SESSION['user'] = serialize($user);
				addRole($user->role);

			} else {
				getMessages()->addError('Niepoprawny login lub hasło');
			}
		}
		
		return ! getMessages()->isError();
	}
	public function action_login(){

		$this->getParams();
		
		if ($this->validate()){
			header("Location: ".getConf()->app_url."/");
		} else {
			
			$this->generateView(); 
		}
		
	}
	
	public function action_logout(){
		session_destroy();
		
		getMessages()->addInfo('Poprawnie wylogowano z systemu');

		$this->generateView();		 
	}
	
	public function generateView(){
		
		getSmarty()->assign('page_title','Strona logowania');
		getSmarty()->assign('form',$this->form);
		getSmarty()->display('LoginView.tpl');		
	}
}