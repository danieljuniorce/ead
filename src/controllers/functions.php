<?php
    require_once 'init.php';
    //Função para conexão de dados com database;
    function db_connect(){
        $PDO = new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST.';charset=utf8', DB_USER,DB_PASSWORD);

        return $PDO;
    }
    //Verificação de Sessão
    function isLoggedIn(){
        if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
            return false;
        }
        return true;
    }
    //Função de Hash de Senha
    function make_hash($str){
        return sha1(md5($str));
    }
    //Selecionar todos os dados do database;
    function camposDataBase($tabela, $parametro = array()){
        $pdo = db_connect();

        $sql = $pdo->query("SELECT * FROM ".$tabela." WHERE ".$parametro);

        return $sql;
    }
    //Função de verificação de horários
    function comprimentoDate(){
        $horaAtual = date('H:m:s');

        if($horaAtual >= '00:00:01' OR $horaAtual <= '11:59:59'){
            $retorno = ('Bom dia');
        }elseif ($horaAtual >= '12:00:00' OR $horaAtual <= '17:59:59'){
            $retorno = ('Boa Tarde');
        }else{
            $retorno = ('Boa Noite');
        }

        return $retorno;
    }
