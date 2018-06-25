<?php 
session_start();
require_once '../init.php';
require 'informacoes-participantes.php';
$updateFaltas = isset($_POST['faltas']) ? $_POST['faltas'] : '';
$updatePresenca = isset($_POST['presenca']) ? $_POST['presenca'] : '';
$updateFaltasJustificadas = isset($_POST['faltasJustificadas']) ? $_POST['faltasJustificadas'] : '';
$updateStatus = isset($_POST['status']) ? $_POST['status'] : '';
$updateTurma = isset($_POST['turma']) ? $_POST['turma'] : '';
$matricula = isset($_POST['matricula']) ? $_POST['matricula'] : '';

global $matricula;
echo $matricula['matriculaAtual'];
$update = db_connect();


$sql = $update->query("UPDATE participantes SET faltas = '$updateFaltas', faltas_justificadas = '$updateFaltasJustificadas', presenca = '$updatePresenca', status = '$updateStatus', turma = '$updateTurma' WHERE matricula = '$matricula'");

header('Location: participantes.php')
?>