<?php

/*
    @author Daniel Souza;
*/

session_start();
require_once 'controllers/init.php';
require 'controllers/login/check.php';

//selecionar Campos no banco de dados por algum paramentros

//Busca de todos dados do Usuario logado na sessão pelo id;



?>
<!doctype html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<!-- Inicio do NavBar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-center">
    <!---->
    <a class="navbar-brand text-center mx-2" href="index.php">INCLUSÃO DIGITAL</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse navbar-light text-center" id="navbarNavDropdown">
        <ul class="nav navbar-nav navbar-right ml-auto">
            <button class="btn btn-primary nav-item mx-1 text-nowrap" id="informacoes" type="submit" href="controllers/perfil/perfil.php"><img src="assets/imagens/mistebin.png" class="img-responsive img-thumbnail" href="index.php" style="width: 1.8cm; height: 1.2cm;"> &nbsp;<?php echo $hora = comprimentoDate();?>,&nbsp;<?php echo $_SESSION['user_name'];?>&nbsp;|&nbsp; Matricula: <?php echo $_SESSION['matricula']; ?></button>
            <button class="btn btn-primary nav-item mx-1" type="submit"><a href="controllers/login/logout.php" class="nav-link text-white">SAIR</a></button>
        </ul>
    </div>
</nav>
<!--Fim do Navbar -->

<!--  Menu Lateral -->
<div class="row my-5">
    <!-- Conteúdo da sideNavbar -->
    <div class="col-md-4">
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active te" id="list-home-list" data-toggle="list" href="#areainicial" role="tab" aria-controls="minhas-informacoes">AVISOS</a>
            <a class="list-group-item list-group-item-action " id="list-informacoes-list" data-toggle="list" href="#minhas-informacoes" role="tab" aria-controls="minhas-informacoes">MINHAS INFORMAÇÕES</a>
            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#frequencia" role="tab" aria-controls="frequencia">FREQUÊNCIA</a>
            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#minha-turma" role="tab" aria-controls="minha-turma">MINHA TURMA</a>
            <a class="list-group-item list-group-item-action" id="list-notas-list" data-toggle="list" href="#notas" role="tab" aria-controls="notas">NOTAS</a>
            <?php if ($_SESSION['key'] == 2) :?>
                <a class="list-group-item list-group-item-action"  href="controllers/rank/rank.php">RANK</a>
                <a class="list-group-item list-group-item-action"  href="controllers/administracao/administracao.php"  >ÁREA DE ADMINISTRAÇÃO</a>
            <?php elseif ($_SESSION['key'] == 3) : ?>
                <a class="list-group-item list-group-item-action"  href="controllers/rank/rank.php">RANK</a>
                <a class="list-group-item list-group-item-action"  href="controllers/participantes/participantes.php"  >BANCO DE PARTICIPANTES</a>
                <a class="list-group-item list-group-item-action"  href="controllers/administracao/administracao.php"  >ÁREA DE ADMINISTRAÇÃO</a>
            <?php endif; ?>
        </div>
        
    </div>
    <div class="col-md-8">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="areainicial" role="tabpanel" aria-labelledby="list-home-list">
                <div class="container">
                    <ul class="jumbotron">
                        <h4 class="display-4 text-center">Seu Portal Online</h4>
                        <p class="text-right">Data e horário da Postagem: 06/06/2018 as 11:40</p>
                        <p class="lead text-justify">&nbsp;&nbsp;&nbsp;Aqui você terá acesso as suas informações cadastrais e seu andamento durante o período do Curso de Informática Básica e Excel Avançado.</p>
                        <p class="my-4 text-justify">&nbsp;&nbsp;&nbsp;Em breve teremos algumas atualizações e implementações para facilitar o seu acesso a informação do seu Curso em qualquer lugar.</p>

                    </ul>
                </div>
            </div>
            <div class="tab-pane fade" id="minhas-informacoes" role="tabpanel" aria-labelledby="list-informacoes-list">
                <ul class="list-group mx-2 mx-2">
                    <li class="text-center my-1 list-group-item" id="dadosCadastrais">DADOS CADASTRAIS</li>
                    <!-- <li class="list-group-item text-right border-primary"><a class="btn btn-primary mx-5"   href="controllers/perfil/perfil.php"> TROCA INFORMAÇÕES </a></li> -->
                    <table class=" table table-striped table-hover bg-light ">
                        <thead class="text-left">
                        <tr>
                            <th>DADOS</th>
                            <th>INFORMAÇÕES</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="">
                            <td class="">Nome</td>
                            <td><?php echo $_SESSION['user_name'];?></td>
                        </tr>
                        <tr>
                            <td>Data de Nascimento</td>
                            <td><?php echo $_SESSION['dataNascimento'];?></td>
                        </tr>
                        <tr>
                            <td>Sexo</td>
                            <td><?php echo $_SESSION['sexo'];?></td>
                        </tr>
                        <tr>
                            <td>Telefone</td>
                            <td><?php echo $_SESSION['celular'];?></td>
                        </tr>
                        <tr>
                            <td>Unidade</td>
                            <td><?php echo $_SESSION['unidade'];?></td>
                        </tr>
                        <tr>
                            <td>Curso Atual</td>
                            <td>
                            <?php
                            if ($_SESSION['curso'] == 1) {
                                    $curso = ('Informática Básica'); 
                            } else {
                                    $curso = ('Excel Avaçando');
                            }

                                echo $curso?></td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td><?php echo $_SESSION['email'];?></td>
                        </tr>
                        </tbody>
                    </table>
                </ul>
            </div>
            <div class="tab-pane fade" id="frequencia" role="tabpanel" aria-labelledby="list-profile-list">
                <ul class="list-group mx-2 my-md-2 ">
                    <li class="text-center my-1 list-group-item" id="frequenciaDados">FREQUÊNCIA GERAL</li>
                    <table class=" table table-striped table-hover bg-light">
                        <thead class="text-left">
                        <tr>
                            <th>VERIFICAÇÕES</th>
                            <th class="text-center">INFORMAÇÕES</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="">
                            <td class="">FALTAS</td>
                            <td class="text-center"><?php

                                   echo $_SESSION['faltas'];
                            ?>
                                   </td>
                        </tr>
                        <tr>
                            <td>FALTAS JUSTIFICADAS</td>
                            <td class="text-center"><?php echo $_SESSION['faltas_justificadas'];?></td>
                        </tr>
                        <tr>
                            <td>PRESENÇA</td>
                            <td class="text-center"><?php echo $_SESSION['presenca'];?></td>
                        </tr>
                        <tr>
                            <td>AULAS TOTAIS</td>
                            <td class="text-center"><?php
                                $aulasTotais = 30;

                                $aulasGerais = $aulasTotais - $_SESSION['presenca'] - $_SESSION['faltas_justificadas'] - $_SESSION['faltas'];
                                echo $aulasGerais;?></td>
                        </tr>
                        </tbody>
                    </table>
                </ul>
            </div>
            <div class="tab-pane fade" id="minha-turma" role="tabpanel" aria-labelledby="list-messages-list">
                <ul class="list-group">
                    <li class="list-group-item text-center" ID="turma">PARTICIPANTES DA SUA TURMA</li>
                </ul>
                <ul class="list-group my-2">
                    <table class=" table table-striped table-hover bg-light">
                        <thead class="">
                        <tr class="text-center">
                            <th>NÚMERO</th>
                            <th class="">NOME</th>
                            <th>PERFIL</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                    
                        $database = db_connect();
                        $turma = $_SESSION['turma'];

                        $select = $database->query("SELECT name FROM participantes WHERE turma = '$turma'");
                        $contagem = 0;
                        foreach ($select->fetchAll(PDO::FETCH_ASSOC) as $user) {
                            echo '<tr class="text-center">';
                                echo '<td class="">'.$contagem = 1 + $contagem.'</td>';
                                echo '<td class="">'.$user['name'].'</td>';
                                echo '<td>A IMPLEMENTAR</td>';
                            echo '</tr>';
                            echo '</tbody>';
                        }?>
                    </table>
                </ul>
            </div>
            <div class="tab-pane fade" id="notas" role="tabpanel" aria-labelledby="list-settings-list">
                <table class=" table table-striped table-hover bg-light">
                    <thead class="">
                    <tr class="text-center">
                        <th>MODULO</th>
                        <th class="">NOTA</th>
                    </tr>
                    <?php if ($_SESSION['curso'] == 1) : ?>
                    </thead>
                    <tbody>
                    <tr class="text-center">
                        <td class="">WORD</td>
                        <td class=""><?php echo $_SESSION['notaWord'];?></td>
                    </tr>
                    <tr class="text-center">
                        <td class="">EXCEL</td>
                        <td class=""><?php echo $_SESSION['notaExcel'];?></td>
                    </tr>
                    <tr class="text-center">
                        <td class="">POWERPOINT</td>
                        <td class=""><?php echo $_SESSION['notaPowerPoint'];?></td>
                    </tr>
                    <tr class="text-center">
                        <td class="">INTERNET</td>
                        <td class=""><?php echo $_SESSION['notaInternet'];?></td>
                    </tr>
                    </tbody>
                    <?php else : ?>
                        <tbody>
                        <tr class="text-center">
                            <td class="">EXCEL - MODULO 1</td>
                            <td class=""><?php echo $_SESSION['notaWord'];?></td>
                        </tr>
                        <tr class="text-center">
                            <td class="">EXCEL - MODULO 2</td>
                            <td class=""><?php echo $_SESSION['notaExcel'];?></td>
                        </tr>
                        <tr class="text-center">
                            <td class="">EXCEL - MODULO 3</td>
                            <td class=""><?php echo $_SESSION['notaPowerPoint'];?></td>
                        </tr>
                        <tr class="text-center">
                            <td class="">EXCEL - MODULO 4</td>
                            <td class=""><?php echo $_SESSION['notaInternet'];?></td>
                        </tr>
                        </tbody>
                    <?php endif;?>
                </table>
            </div>
            <div class="tab-pane fade" id="rank" role="tabpanel" aria-labelledby="list-rank-list">
                <div class="container">
                    <ul class="list-group my-2">
                        <li class="list-group-item text-center" id="modalidade">ESCOLHA A MODALIDADE DE RANK</li>
                    </ul>
                    <form method="post" action="index.php#rank">
                        <div class="input-group">
                            <select class="custom-select mx-2" id="name" name="select">
                                <option selected>Modalidade de Rank</option>
                                <option value="1">Rank Geral</option>
                                <option value="2">Rank Turma</option>
                                <option value="3">Rank Presença</option>
                                <option value="4">Rank Faltas</option>
                                <option value="5">Rank Pontos - Geral</option>
                                <option value="6">Rank Pontos - Turma</option>
                            </select>
                            <div class="input-group-append">
                                <input class="btn btn-primary mx-2" value="ESCOLHE" type="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="administracao" role="tabpanel" aria-labelledby="list-adminitracao-list">
                    <ul class="list-group my-2">
                        <li class="list-group-item text-center" id="modalidade">VERIFICAÇÕES DE TURMA</li>
                    </ul>
                    <form method="post" action="index.php">
                        <div class="input-group">
                            <select class="custom-select mx-2" id="name" name="administracao">
                                <option selected>SELECIONAR A TURMA</option>
                                <option value="1">TURMA 1</option>
                                <option value="2">TURMA 2</option>
                                <option value="3">TURMA 3</option>
                                <option value="4">TURMA 4</option>
                                <option value="5">TURMA 5</option>
                                <option value="6">TURMA 6</option>
                            </select>
                            <div class="input-group-append">
                                <input class="btn btn-primary mx-2" value="ESCOLHE" type="submit">
                            </div>
                        </div>
                    </form>
                <ul class="list-group">
                    <li class="list-group-item text-center" ID="turma">PARTICIPANTES DA SUA TURMA</li>
                </ul>
                <ul class="list-group my-2">
                    <table class=" table table-striped table-hover bg-light">
                        <thead class="">
                        <tr class="text-center">
                            <th>NÚMERO</th>
                            <th class="">NOME</th>
                            <th>PERFIL</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $selecaoTurmaVerificao = isset($_POST['adminitracao']) ? $_POST['adminitracao'] : '';

                        $database = db_connect();


                        $select = $database->query("SELECT name FROM participantes WHERE turma = '$selecaoTurmaVerificao'");
                        $contagem = 0;
                        foreach ($select->fetchAll(PDO::FETCH_ASSOC) as $user) {
                            echo '<tr class="text-center">';
                            echo '<td class="">'.$contagem = 1 + $contagem.'</td>';
                            echo '<td class="">'.$user['name'].'</td>';
                            echo '<td>A IMPLEMENTAR</td>';
                            echo '</tr>';
                            echo '</tbody>';
                        }
                        ?>
                    </table>
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
