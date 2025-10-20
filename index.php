<?php include('login.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Web Gerenciador de Tarefas — Login</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root{
      --bg-1:#111315; 
      --bg-2:#1b1e22;  
      --txt-1:#e8eaed; 
      --txt-2:#9aa0a6; 
      --bd-1:#2a2f36;  
      --acc:#6c757d;   
    }
    body{
      min-height:100vh;
      background: radial-gradient(800px 400px at 15% -10%, #2a2f36 0, transparent 60%),
                  radial-gradient(900px 500px at 110% 110%, #2a2f36 0, transparent 60%),
                  var(--bg-1);
      color:var(--txt-1);
    }
    .login-card{
      background:var(--bg-2);
      border:1px solid var(--bd-1);
      border-radius:1rem;
      box-shadow:0 10px 30px rgba(0,0,0,.35);
    }
    .text-muted{ color:var(--txt-2)!important; }
    .input-group-text{ background:transparent; color:var(--txt-2); border-color:var(--bd-1); }
    .form-control{
      background:#15181c; border-color:var(--bd-1); color:var(--txt-1);
    }
    .form-control::placeholder{ color:#6b7076; }
    .btn-primary{ background:#6c757d; border-color:#6c757d; }
    .btn-primary:hover{ background:#5f6770; border-color:#5f6770; }
    .btn-light{ background:#e9ecef; }
    .btn-outline-light{ border-color:#cfd4da; color:#cfd4da; }
    .btn-outline-light:hover{ background:#cfd4da; color:#111315; }
  </style>
</head>
<body>
  <div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="col-12 col-sm-10 col-md-7 col-lg-5">
      <div class="card login-card">
        <div class="card-body p-4 p-md-5">

          <h1 class="h4 mb-1">Entrar</h1>
          <p class="text-muted mb-4">Acesse suas tarefas com segurança.</p>

          <?php if ($msg != "") { ?>
            <div class="alert alert-<?php echo $tpMsg; ?> rounded-3">
              <strong><?php echo $msg; ?></strong>
            </div>
          <?php } ?>

          <form action="index.php" method="post" autocomplete="off">
            <input type="hidden" name="form_origem" value="login">

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" class="form-control" id="email" name="email" placeholder="seu@email.com" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="senha" class="form-label">Senha</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
              </div>
            </div>

            <div class="d-grid gap-2 mt-4">
              <button type="submit" class="btn btn-primary btn-lg">
                <i class="bi bi-box-arrow-in-right me-1"></i> Acessar
              </button>
              <div class="d-flex gap-2">
                <a href="form-criar-conta.php" class="btn btn-light flex-fill"><i class="bi bi-person-plus"></i> Criar conta</a>
                <a href="listar-tarefas.php" class="btn btn-light flex-fill"><i class="bi bi-list-task"></i> Ver tarefas</a>
              </div>
              <a href="form-atualizar-senha.php?editar=<?php echo $id ?? ''; ?>" class="btn btn-outline-light">
                <i class="bi bi-key"></i> Atualizar Senha
              </a>
            </div>
          </form>

          <div class="text-center mt-4 small text-muted">
            &copy; <?php echo date('Y'); ?> — Gerenciador de Tarefas
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>