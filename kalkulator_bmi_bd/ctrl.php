<?php
require_once 'init.php';

getRouter()->setDefaultRoute('calcCompute'); // akcja/ścieżka domyślna
getRouter()->setLoginRoute('login'); // akcja/ścieżka na potrzeby logowania (przekierowanie, gdy nie ma dostępu)

getRouter()->addRoute('login',			'LoginCtrl');
getRouter()->addRoute('logout',			'LoginCtrl',['user','admin']);
getRouter()->addRoute('calcCompute',		'CalcCtrl',['user','admin']);

getRouter()->go();