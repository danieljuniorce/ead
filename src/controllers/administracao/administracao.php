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
            <button class="btn btn-primary nav-item mx-1 text-nowrap" id="informacoes"><img src="../../assets/imagens/mistebin.png" class="img-responsive img-thumbnail" href="../../index.php" style="width: 1.8cm; height: 1.2cm;"> &nbsp;<?php echo $hora = comprimentoDate();?>,&nbsp;<?php echo $_SESSION['user_name'];?>&nbsp;|&nbsp; Matricula: <?php echo $_SESSION['matricula']; ?></button>
            <button class="btn btn-primary nav-item mx-1" type="submit"><a href="../../controllers/login/logout.php" class="nav-link text-white">SAIR</a></button>
        </ul>
    </div>
</nav>
<!--Fim do Navbar -->

<div class="container my-5">
    <ul class="list-group">
        <h1 class="list-group-item negrito text-center py-5" style="font-size: 20pt;"> ÁREA ADMINISTRATIVA DE PARTICIPANTES &nbsp; <button class="btn btn-primary" type="submit"><a href="../../index.php" class="btn-link text-white">VOLTAR</a></button></h1>
    </ul>
<?php if ($_SESSION['key'] == 2 OR $_SESSION['key'] == 3):?>
    <form method="post" action="administracao-turmas.php" class="my-3">
        <ul class="list-group">
            <li class="list-group-item negrito text-center" style="font-size: 16pt;">SELECIONE A TURMA PARA TODAS AS INFORMAÇÕES DE CADA PARTICIPANTE</li>
        </ul>
        <div class="input-group my-3">
            <select class="custom-select" id="inputGroupSelect04" name="turmas">
                <option selected>ESCOLHA A TURMA</option>
                <option value="1">Turma 1</option>
                <option value="2">Turma 2</option>
                <option value="3">Turma 3</option>
                <option value="4">Turma 4</option>
            </select>
            <div class="input-group-append">
                <button class="btn btn-outline-dark" type="submit">SELECIONE</button>
            </div>
        </div>
    </form>
    <?php else: header('Location: ../../index.php'); ?>

    <?php endif;?>
</div>
</body>
</html>
