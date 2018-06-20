<?php

//Requerimento dos arquivos de iniciação;
require '../functions.php';

//Variaveis de autenticação de email e senha recebidas do banco de dados;
$email = isset($_POST['email']) ? $_POST['email'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

//Hash na senha;
$senhaHash = make_hash($senha);

//Seleção de dados;
$pdo = db_connect();
$sql = "SELECT * FROM participantes WHERE email = :email AND password = :senha";
$stmt = $pdo->prepare($sql);

$stmt->bindParam(':email', $email);
$stmt->bindParam(':senha', $senhaHash);
$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($users) <= 0) {
    echo "Email ou Senha Incorretos";
        exit();
}
$user = $users[0];
session_start();
$_SESSION['logged_in'] = true;
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];
$_SESSION['matricula'] = $user['matricula'];
$_SESSION['sexo'] = $user['sexo'];
$_SESSION['dataNascimento'] = $user['data_nascimento'];
$_SESSION['celular'] = $user['celular'];
$_SESSION['curso'] = $user['curso'];
$_SESSION['email'] = $user['email'];
$_SESSION['unidade'] = $user['unidade'];
$_SESSION['key'] = $user['key'];
$_SESSION['turma'] = $user['turma'];
$_SESSION['notaWord'] = $user['nota_word'];
$_SESSION['notaExcel'] = $user['nota_excel'];
$_SESSION['notaPowerPoint'] = $user['nota_powerpoint'];
$_SESSION['notaInternet'] = $user['nota_internet'];
$_SESSION['status'] = $user['status'];
$_SESSION['faltas'] = $user['faltas'];
$_SESSION['faltas_justificadas'] = $user['faltas_justificadas'];
$_SESSION['presenca'] = $user['presenca'];
$_SESSION['img'] = $user['img'];

$id = $user['id'];
$ultimoLogin = date('Y:m:d H:m:s');
$atualizarLogin = db_connect();
$sql = "UPDATE participantes SET ultimo_login = :ultimoLogin WHERE id = '$id'";
$stmt = $atualizarLogin->prepare($sql);
$stmt->bindParam(':ultimoLogin', $ultimoLogin);
$stmt->execute();

header('Location: ../../index.php') ;


