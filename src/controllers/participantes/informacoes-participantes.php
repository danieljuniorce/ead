<?php
session_start();
require_once '../init.php';

$matriculaParticipante = isset($_POST['matriculaParticipante']) ? $_POST['matriculaParticipante'] : '';

?>

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
    <script src="../../js/bootstrap.min.js"></script>
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
            <button class="btn btn-primary nav-item mx-1 text-nowrap" id="informacoes"><img src="../../assets/imagens/mistebin.png" class="img-responsive img-thumbnail" style="width: 1.8cm; height: 1.2cm;"> &nbsp;<?php echo $hora = comprimentoDate();?>,&nbsp;<?php echo $_SESSION['user_name'];?>&nbsp;|&nbsp; Matricula: <?php echo $_SESSION['matricula']; ?></button>
            <button class="btn btn-primary nav-item mx-1" type="submit"><a href="../../controllers/login/logout.php" class="nav-link text-white">SAIR</a></button>
        </ul>
    </div>
</nav>
<div class="container my-5">
    <ul class="list-group">
        <h1 class="list-group-item negrito text-center py-5" style="font-size: 20pt;"> BANCO DE PARTICIPANTES &nbsp; <button class="btn btn-primary" type="submit"><a href="../../index.php" class="btn-link text-white">VOLTAR</a></button></h1>
    </ul>
    <?php if ($_SESSION['key'] == 3):?>
        <?php
            $PDO = db_connect();
            $sql = $PDO->query("SELECT * FROM participantes WHERE matricula = '$matriculaParticipante'");
            $user = $sql->fetch();
            if($sql->rowCount() <= 0){
                header('Location: participantes.php');
            }
        ?>
        <ul class="list-group my-3">
            <li class="list-group-item negrito text-center"> MATRICULA DO PARTICIPANTE: <?php echo $user['matricula']; ?> </li>
            <li class="list-group-item negrito text-center"> NOME DO PARTICIPANTE: <?php echo $user['name']; ?> </li>
            <li class="list-group-item">
            <form method="post" action="atualizarParticipante.php">
                <?php
                $_SESSION['aluno'] = $matriculaParticipante;
                echo '<div class="form-row">';
                    echo '<div class="form-group col-3">';
                        echo '<label for="turma" class="text-center">TURMA DO PARTICIPANTE</label>';
                        echo '<input id="turma" type="number" class="form-control text-center" name="trocaTurma" placeholder='.$user['turma'].'
                    ></div>';
                        echo '<div class="form-group col-3">';
                        echo '<label for="presenca" class="text-center">PRESENÇA</label>';
                        echo '<input id="presenca" type="number" class="form-control text-center" name="trocaPresenca" placeholder='.$user['presenca'].'
                    ></div>';
                echo '<div class="form-group col-3">';
                echo '<label for="faltas" class="text-center">FALTAS</label>';
                echo '<input id="faltas" type="number" class="form-control text-center" name="trocaFaltas" placeholder='.$user['faltas'].'
                    ></div>';
                echo '<div class="form-group col-3">';
                echo '<label for="faltasJustificadas" class="text-center">FALTAS JUSTIFICADAS</label>';
                echo '<input id="faltasJustificadas" type="number" class="form-control text-center" name="trocaFaltasJustificadas" placeholder='.$user['faltas_justificadas'].'
                    ></div>';
                    echo '</div>';
                echo '<button class="btn btn-primary text-right" type="submit">ATUALIZAR</button>';


                ?>
            </form>

            </li>
        </ul>
        </div>
    <?php else: header('Location: ../../index.php'); ?>

    <?php endif;?>

</body>
</html>