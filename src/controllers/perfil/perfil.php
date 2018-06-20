<?php
    session_start();
    require_once '../init.php';
?>

<!DOCTYPE html>
<html>
<head>
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
</head>
<body>
<!-- Inicio do NavBar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-center">
    <!---->
    <a class="navbar-brand text-center mx-2" href="index.php">LOGO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse navbar-light text-center" id="navbarNavDropdown">
        <ul class="nav navbar-nav navbar-right ml-auto">
            <button class="btn btn-primary nav-item mx-1 text-nowrap" id="informacoes"><img src="../../assets/imagens/mistebin.png" class="img-responsive img-thumbnail" href="index.php" style="width: 1.8cm; height: 1.2cm;"> &nbsp;<?php echo $hora = comprimentoDate();?>,&nbsp;<?php echo $_SESSION['user_name'];?>&nbsp;|&nbsp; Matricula: <?php echo $_SESSION['matricula']; ?></button>
            <button class="btn btn-primary nav-item mx-1" type="submit"><a href="../login/logout.php" class="nav-link text-white">SAIR</a></button>
        </ul>
    </div>
</nav>
<!--Fim do Navbar -->
    <div class="container my-5">
        <h5>SEU PERFIL</h5>


        <div class="card">
            <img src="<?php $_SESSION['img']?>"/>
        </div>
    </div>
</body>
</html>