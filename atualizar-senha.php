<?php
require_once 'conectar.php';  

if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && ($_POST['form_origem'] ?? '') === 'atualizar_senha') {

    $email       = trim($_POST['email'] ?? '');
    $senhaAtual  = $_POST['senha_atual'] ?? '';
    $novaSenha   = $_POST['nova_senha'] ?? '';
    $confirmar   = $_POST['confirmar_senha'] ?? '';

    if ($email === '' || $senhaAtual === '' || $novaSenha === '' || $confirmar === '') {
        exit('Preencha todos os campos.');
    }
    if ($novaSenha !== $confirmar) {
        exit('As senhas não coincidem');
    }

    $stmt = $con->prepare('SELECT id, senha FROM admin WHERE email = ? LIMIT 1');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows !== 1) {
        exit('Usuário não encontrado.');
    }

    $stmt->bind_result($id, $senhaBanco);
    $stmt->fetch();
    $stmt->close();

    $ehHash = (bool)preg_match('/^\$2y\$|\$argon2(id|i)?\$/', $senhaBanco);
    $ok = $ehHash ? password_verify($senhaAtual, $senhaBanco)
                  : hash_equals($senhaBanco, $senhaAtual);

    if (!$ok) {
        exit('Senha atual incorreta.');
    }

    $novoHash = password_hash($novaSenha, PASSWORD_DEFAULT);
    $upd = $con->prepare('UPDATE admin SET senha = ? WHERE id = ?');
    $upd->bind_param('si', $novoHash, $id);
    $upd->execute();
    $upd->close();

    header('Location: index.php?ok=senha_atualizada');
    exit;
}