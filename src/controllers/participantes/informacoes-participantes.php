<?php
session_start();
require_once '../init.php';

$matriculaParticipante = isset($_POST['matriculaParticipante']) ? $_POST['matriculaParticipante'] : '';

echo $matriculaParticipante;

$conexaoBanco = db_connect();

$stmt = $conexaoBanco->query("SELECT * FROM participantes WHERE matricula = '$matriculaParticipante'");

if($stmt->rowCount() == 0) {
    header('Location: participantes.php');
}

?>