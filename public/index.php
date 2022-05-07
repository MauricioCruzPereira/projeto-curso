<?php

require_once(dirname(__FILE__,2) . '/src/config/config.php');
// require_once(dirname(__FILE__,2) . '/src/views/login.php');

require_once(CONTROLLER_PATH . '/login.php');

//loadView('login',['texto' =>'abc123']);
// require_once(MODEL_PATH . '/login.php');

// $login = new Login([
//     'email' => 'admin@cod3r.com.br',
//     'password'=>'a'
// ]);

// try{
//     $login->checkLogin();
//     echo 'Deu certo';
// }catch(Exception $e){
//     echo "Problema de login: {$e}";
// }