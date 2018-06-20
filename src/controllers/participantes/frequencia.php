<?php 
    session_start();
    require_once '../init.php';

    $escolhaTurma = isset($_POST['frequencia']) ? $_POST['frequencia'] : '';

    $conexaoDb = db_connect();

    $sql = $conexaoDb->query("SELECT matricula, name FROM participantes WHERE turma = '$escolhaTurma'");

?>

<!DOCTYPE html>
<html>
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
            <h1 class="list-group-item negrito text-center py-5" style="font-size: 20pt;"> FREQUÊNCIA DA TURMA <?php echo 'TURMA: '.$escolhaTurma;?> &nbsp; <button class="btn btn-primary" type="submit"><a href="../../index.php" class="btn-link text-white">VOLTAR</a></button></h1>
        </ul>
        <table  class= "table table-striped table-hover bg-light">
            <thead>
                <tr>
                    <th class="text-center">MATRICULA</th>
                    <th class="text-center">NOME</th>
                    <th class="text-center">FREQUÊNCIA</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($sql->fetchAll() as $user) {
                        echo '<tr>';
                        echo '<td class="text-center">'.$user['matricula'].'</td>';
                        echo '<td class="text-center">'.$user['name'].'</td>';
                        echo '<td class="text-center">
                            <form method="post" class="text-center">
                                <select class="custom-select text-center" name="frequenciaAlunos[]" id="frequenciaAlunos">
                                    <option value="1" name="presenca" selectd>P</option>
                                    <option value="1" name="falta" selectd>F</option>
                                    <option value="1" name="faltaJustificada" selectd>FJ</option>
                                </select>
                            </form>
                        </td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>


</body>
</html>