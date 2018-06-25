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
        </li>
        <li class="list-group-item">
                <form method="POST" action="informacoes-participantes.php">
                    <div class="form-row">
                        <div class="col-10 text-center">
                            <input type="number" class="form-control" name="matriculaParticipante" placeholder="INSIRAR A MATRICULA DO PARTICIPANTE">
                        </div>
                        <div class="col-2 px-5">
                            <button class="btn btn-primary" type="submit">PROCURAR</button>
                        </div>
                    </div>
                </form>
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
            $sql = $PDO->query("SELECT * FROM participantes ORDER BY name ASC");

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
                <form method="POST" action="informacoes-participantes.php">
                    <div class="form-row">
                        <div class="col-10 text-center">
                            <select name="matriculaParticipante" id="participante" class="custom-select">
                                <?php foreach ($variable as $key => $value) : ?>
                                    
                                <option value="<?php echo $user['matricula']; ?>"><?php echo $user['matricula']; ?></option>

                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-2 px-5">
                            <button class="btn btn-primary" type="submit">PROCURAR</button>

                        </div>
                    </div>
                </form>

    <?php else : header('Location: ../../index.php'); ?>

    <?php endif;?>

</body>
</html>