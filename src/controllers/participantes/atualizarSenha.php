<?php 
    session_start();
    require_once '../init.php';

    $updateSenha = isset($_POST['senha']) ? $_POST['senha'] : '';
    $matricula = isset($_POST['matricula']) ? $_POST['matricula'] : '';
    $updateSenhaHash = make_hash($updateSenha);
    global $matricula;
    $update = db_connect();


    $sql = $update->query("UPDATE participantes SET password = '$updateSenhaHash' WHERE matricula = '$matricula'");
    header('Location: participantes.php');
?>