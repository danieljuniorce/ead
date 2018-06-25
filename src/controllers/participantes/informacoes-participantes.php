<?php
session_start();
require_once '../init.php';

$matriculaParticipante = isset($_POST['matriculaParticipante']) ? $_POST['matriculaParticipante'] : '';


$conexaoBanco = db_connect();

$stmt = $conexaoBanco->query("SELECT * FROM participantes WHERE matricula = '$matriculaParticipante'");

if ($stmt->rowCount() == 0 && $_SESSION['key']  <= 1) {
    header('Location: participantes.php');
}
$user = $stmt->fetch();
global $matricula;
$matricula['matriculaAtual'] = $user['matricula'];
?>
<!DOCTYPE html>
<html>
<head>
<!doctype html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../.../js/bootstrap.min.js"></script>
</head>
<body>
<!-- Inicio do NavBar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-center">
    <!---->
    <a class="navbar-brand text-center mx-2" href="../../index.php">INCLUSÃO DIGITAL</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse navbar-light text-center" id="navbarNavDropdown">
        <ul class="nav navbar-nav navbar-right ml-auto">
            <button class="btn btn-primary nav-item mx-1 text-nowrap" id="informacoes" type="submit" href="../..controllers/perfil/perfil.php"><img src="../../assets/imagens/mistebin.png" class="img-responsive img-thumbnail" href="index.php" style="width: 1.8cm; height: 1.2cm;"> &nbsp;<?php echo $hora = comprimentoDate();?>,&nbsp;<?php echo $_SESSION['user_name'];?>&nbsp;|&nbsp; Matricula: <?php echo $_SESSION['matricula']; ?></button>
            <button class="btn btn-primary nav-item mx-1" type="submit"><a href="../../controllers/login/logout.php" class="nav-link text-white">SAIR</a></button>
        </ul>
    </div>
</nav>
    <ul class="list-group container my-5">
        <li class="list-group-item">
            <h1 class="text-center negrito">FREQUÊNCIA </h1>
            <form method="post" class="my-4" action="atualizarFrequencia.php">
                <div class="form-row">
                    <label for="matricula">MATRICULA DO ALUNO <?php echo $user['name'];?></label></br>
                    <input class="form-control text-center negrito" id="matricula" name="matricula" value="<?php echo $user['matricula']?>" >
                    <div class="col-6">
                        <label for="faltas">FALTAS</label>
                        <input class="form-control text-center" name="faltas" type="number" id="faltas" value="<?php echo $user['faltas'];?>">
                    </div>
                    <div class="col-6">
                        <label for="presenca">PRESENÇA</label>
                        <input class="form-control text-center" name="presenca" type="number" id="presenca" value="<?php echo $user['presenca'];?>">
                    </div>
                </div>
                <div class="form-row my-5">
                    <div class="col-6">
                        <label for="faltasJustificadas">FALTA JUSTIFICADA</label>
                        <input class="form-control text-center" name="faltasJustificadas" type="number" id="faltasJustificadas" value="<?php echo $user['faltas_justificadas'];?>">
                    </div>
                    <div class="col-6">
                        <label for="status">STATUS</label>
                        <input class="form-control text-center" name="status" type="text" id="status" value="<?php echo $user['status'];?>">
                    </div>
                </div>
                <div class="form-row my-5">
                    <div class="col-6">
                        <label for="turma">TURMA</label>
                        <input class="form-control text-center" name="turma" type="number" id="turma" value="<?php echo $user['turma'];?>">
                    </div>
                </div>
                <input class="btn btn-primary " type="submit" placeholder="VALUE" value="ENVIAR">
            </form>
        </li>
    </ul>
</body>
</html>