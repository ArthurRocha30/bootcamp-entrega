<?php
session_start();
require_once 'conectar.php'; 

$msg = "";
$tpMsg = "danger";

if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && ($_POST['form_origem'] ?? 'login') === 'login') {

    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if ($email === '' || $senha === '') {
        $msg = "Preencha todos os campos.";
    } else {
        $stmt = $con->prepare('SELECT id, senha FROM admin WHERE email = ? LIMIT 1');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($id, $senhaBanco);
            $stmt->fetch();
            $stmt->close();

            $ehHash = preg_match('/^\$2y\$|\$argon2(id|i)?\$/', $senhaBanco) === 1;

            $ok = $ehHash ? password_verify($senha, $senhaBanco)
                          : hash_equals($senhaBanco, $senha); 

            if ($ok) {

                if (!$ehHash) {
                    $novoHash = password_hash($senha, PASSWORD_DEFAULT);
                    $upd = $con->prepare('UPDATE admin SET senha = ? WHERE id = ?');
                    $upd->bind_param('si', $novoHash, $id);
                    $upd->execute();
                    $upd->close();
                }
                $_SESSION['id_admin'] = $id;
                echo "<script>window.location.href='listar-tarefas.php';</script>";
                exit;
            } else {
                $msg = "Usuário ou Senha incorretos.";
            }
        } else {
            $stmt->close();
            $msg = "Usuário ou Senha incorretos.";
        }
    }
}