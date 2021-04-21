<?php

session_start();// siempre se inicia sesion al jugar con $_SESSION
// se puede cerar sesion con SESSION_DESTROY O UNSET  y esta forma 
$_SESSION = [];

header('location: /');

