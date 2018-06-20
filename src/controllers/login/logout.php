<?php

//Inicia sessão
session_start();

//mudando o valor do logged_in para false;
$_SESSION['logged_in'] = false;

//finalizar a sessão
session_destroy();

header('Location: ../../login.html');

