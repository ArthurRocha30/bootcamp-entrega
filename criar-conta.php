<?php
require_once 'conectar.php'; 

$msg = "";
$tpMsg = "danger";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';
    $conf  = $_POST['confirmar'] ?? '';

    if ($email === '' || $senha === '' || $conf === '') {
        $msg = "Preencha todos os campos.";
        return;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "Email inválido.";
        return;
    }
    if ($senha !== $conf) {
        $msg = "As senhas não coincidem.";
        return;
    }


    $stmt = $con->prepare('SELECT id FROM admin WHERE email = ? LIMIT 1');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->close();
        $msg = "Já existe uma conta com esse email.";
        return;
    }
    $stmt->close();

 
    $hash = password_hash($senha, PASSWORD_DEFAULT);


    $ins = $con->prepare('INSERT INTO admin (email, senha) VALUES (?, ?)');
    $ins->bind_param('ss', $email, $hash);
    if ($ins->execute()) {
        $tpMsg = "success";
        $msg   = "Conta criada! Faça login.";
    } else {
        $msg = "Erro ao criar conta.";
    }
    $ins->close();
}