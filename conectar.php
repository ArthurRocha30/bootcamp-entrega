<?php
function conectar($sql){
    $servidor = "localhost";
    $usuario  = "root";
    $senha    = "";
    $banco    = "mydb";
    $id       = "";

    if(false){
        $id    = "id20602874_";
        $senha = "XnqIjz*(8Tb^4B=";
    }

    $usuario = $id . $usuario;
    $banco   = $id . $banco;

    $con = new mysqli($servidor, $usuario, $senha, $banco);

    if($con->connect_error){
        die("Erro: " . $con->connect_error);
    }

    return $con->query($sql);
}


$servidor = "localhost";
$usuario  = "root";
$senha    = "";
$banco    = "mydb";
$id       = "";

if(false){
    $id    = "id20602874_";
    $senha = "XnqIjz*(8Tb^4B=";
}

$usuario = $id . $usuario;
$banco   = $id . $banco;

$con = new mysqli($servidor, $usuario, $senha, $banco);
if($con->connect_error){
    die("Erro: " . $con->connect_error);
}
$con->set_charset("utf8mb4");
?>