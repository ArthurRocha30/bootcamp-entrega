<?php
include("conectar.php");
$id = $titulo = $descricao = $tpMsg = $msg = "";


if(isset($_POST["titulo"])){
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $id = $_POST["id"];
    if($id == ""){
        $sql = "insert into tarefa(id_admin, titulo, descricao) values($id_admin,'$titulo','$descricao');";
    }else{
        $sql = "update tarefa set titulo = '$titulo', descricao = '$descricao' where id = $id and id_admin = $id_admin ";
    }
    conectar($sql);
    $tpMsg = "success";
    $msg = "Ok ao gravar.";
    $id = $titulo = $descricao = "";
}

if(isset($_GET['editar'])){
    $id = $_GET['editar'];
    $sql = "select * from tarefa where id_admin = $id_admin and id = $id";
    $resut = conectar($sql);
    if($linha = $resut->fetch_assoc()){
        $titulo = $linha['titulo'];
        $descricao = $linha['descricao'];
    }
}

if(isset($_GET['apagar'])){
    $id = $_GET['apagar'];
    $sql = "delete from tarefa where id_admin = $id_admin and id = $id";
    conectar($sql);
    $msg = "Ok ao apagar!";
    $tpMsg = "success";
}

$sql = "select * from tarefa where id_admin = $id_admin;";
$resut = conectar($sql);