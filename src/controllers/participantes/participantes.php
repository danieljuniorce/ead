<?php
session_start();
require_once '../init.php';


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
        <li class="list-group-item">
            <h4 class="negrito text-center">FREQUÊNCIA DAS TURMAS</h4>
            <form action="frequencia.php" method="post">
                <div class="form-row">
                    <div class="col-10 form-group">
                        <select class="custom-select text-center" name="frequencia" id="frequencia">
                            <option selectd>SELECIONE A TURMA</option>
                            <option value="1">TURMA 1</option>
                            <option value="2">TURMA 2</option>
                            <option value="3">TURMA 3</option>
                            <option value="4">TURMA 4</option>
                        </select>
                    </div>
                    <div class="mx col-2">
                        <button class="btn btn-primary px-5" type="submit">ESCOLHER</button>
                    </div>
                </div>
            </form>
        </li>
    </ul>
    <?php if ($_SESSION['key'] == 3) : ?>

        <table class=" table table-striped table-hover bg-light">
            <thead>
            <tr>
                <th class="text-center">MATRICULA</th>
                <th class="text-center">NOME</th>
                <th class="text-center">TURMA</th>
                <th class="text-center">PRESENÇAS</th>
                <th class="text-center">FALTAS</th>
                <th class="text-center">FALTAS JUSTIFICADAS</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $PDO = db_connect();
            $sql = $PDO->query("SELECT * FROM participantes");

            if($sql->rowCount() > 0){

                foreach ($sql->fetchAll() as $user) {
                    echo '<tr>';
                    echo '<td class="text-center">'.$user['matricula'].'</td>';
                    echo '<td class="">'.$user['name'].'</td>';
                    echo '<td class="text-center">'.$user['turma'].'</td>';
                    echo '<td class="text-center">'.$user['presenca'].'</td>';
                    echo '<td class="text-center">'.$user['faltas'].'</td>';
                    echo '<td class="text-center">'.$user['faltas_justificadas'].'</td>';
                }
            }
            ?>
            </tbody>
        </table>
    <?php else : header('Location: ../../index.php'); ?>

    <?php endif;?>

</body>
</html>