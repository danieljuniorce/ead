<?php
date_default_timezone_set('America/Bahia');

//requerimento das configurações essenciais;
require_once '../init.php';

//Amazenamento de variavel do campo de registro;

//Variavel de nome
$registerNome = isset($_POST['nome']) ? $_POST['nome'] : '';

//Variavel de amazenamento de E-mail;
$registerEmail = isset($_POST['email']) ? $_POST['email'] : '';

//Variavel de amazenamento de data de nascimento
$registerDataNascimento = isset($_POST['dataNascimento']) ? $_POST['dataNascimento'] : '';

//Variavel de amazenamento da senha sem hash
$registerSenha = isset($_POST['senha']) ? $_POST['senha'] : '';

//Variavel de confimação de email;
$registerConfimarSenha = isset($_POST['confirmarSenha']) ? $_POST['confirmarSenha'] : '';

//Variavel de amazenamento de sexo;
$registerSexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';

//Variavel de amazenamento de Telefone;
$registerTelefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';

//Variavel de amazenamento de Curso;
$registerCurso = isset($_POST['curso']) ? $_POST['curso'] : '';

//Variavel de amazenamento de unidade;
$registerUnidade = isset($_POST['unidade']) ? $_POST['unidade'] : '';

//Variavel de amazenamento de registro;
$registerDataRegistro = date('Y:m:d H:m:s');
$registerDataUltimoLogin = date('Y:m:d H:m:s');
//Variavel de amazenamento de Matricula
$registerMatricula = ('2018').rand();

$PDO = db_connect();
$sql = $PDO->query("SELECT * FROM participantes WHERE email = '$registerEmail' OR matricula = '$registerMatricula'");
if($sql->rowCount() > 0){
    echo 'Email já cadastrado ou Matricula Repetida';
    exit();
}

if($registerSenha == $registerConfimarSenha){
    //Hash na senha após confimação;
    $senhaHash = make_hash($registerSenha);

}else{
    echo 'A senha está diferente da confirmação';
    exit();
}

$database = db_connect();

$sql = "INSERT INTO participantes SET name = :name, password = :senha, email = :email, sexo = :sexo, celular = :celular, unidade = :unidade, curso = :curso, data_registro = :dataRegistro, data_nascimento = :dataNascimento, matricula = :matricula, ultimo_login = :ultimoLogin";

$stmt = $database->prepare($sql);
$stmt->bindParam(':name',$registerNome);
$stmt->bindParam(':senha',$senhaHash);
$stmt->bindParam(':email',$registerEmail);
$stmt->bindParam(':sexo',$registerSexo);
$stmt->bindParam(':celular',$registerTelefone);
$stmt->bindParam(':unidade',$registerUnidade);
$stmt->bindParam(':curso',$registerCurso);
$stmt->bindParam(':dataRegistro',$registerDataRegistro);
$stmt->bindParam(':dataNascimento',$registerDataNascimento);
$stmt->bindParam(':matricula', $registerMatricula);
$stmt->bindParam(':ultimoLogin',$registerDataUltimoLogin);
$stmt->execute();

header('Location: ../../login.html');