<?php
    session_start();
    require_once '../init.php';

    $turma = isset($_POST['turmas']) ? $_POST['turmas'] : '';
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
<!--Fim do Navbar -->
<?php if ($_SESSION['key'] == 2 OR $_SESSION['key'] == 3):?>
<div class="container-fluid my-5">
    <ul class="list-group">
        <h1 class="list-group-item negrito text-center py-5" style="font-size: 20pt;"> ÁREA ADMINISTRATIVA DE PARTICIPANTES &nbsp; <button class="btn btn-primary" type="submit"><a href="administracao.php" class="btn-link text-white">VOLTAR</a></button><br>TURMA: <?php ;
            if($turma == 1){
                $turmaAtual = ('Informática Básica');
            }else
            {
                $turmaAtual = ('Sem Turma');
            }

            echo $turma.' - '.$turmaAtual;?> </h1>
    </ul>
        <table class=" table table-striped table-hover bg-light">
            <thead>
                <tr>
                    <th>MATRICULA</th>
                    <th>NOME</th>
                    <th>TURNO</th>
                    <th class="text-center">TELEFONE</th>
                    <th class="text-center">FALTAS</th>
                    <th class="text-center">E-MAIL</th>
                    <th class="text-center">STATUS</th>
                </tr>
            </thead>
            <tbody>

                    <?php
                        $PDO = db_connect();
                        $sql = $PDO->query("SELECT * FROM participantes WHERE turma = '$turma' ORDER BY name ASC");

                        if($sql->rowCount() > 0){

                            foreach ($sql->fetchAll() as $user){
                                echo '<tr>';
                                    echo '<td>'.$user['matricula'].'</td>';
                                    echo '<td>'.$user['name'].'</td>';
                                    echo '<td>'.$user['turno'].'</td>';
                                    echo '<td class="text-center">'.$user['celular'].'</td>';
                                    echo '<td class="text-center">'.$user['faltas'];'</td>';
                                    echo '<td class="text-center">'.$user['email'].'</td>';
                                    echo '<td class="text-center">'.$user['status'].'</td>';
                                echo '</tr>';
                            }
                        }

                    ?>
            </tbody>
        </table>
    <?php else: header('Location: ../../index.php'); ?>

    <?php endif;?>
</div>
</body>
</html>