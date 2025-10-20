<?php include('criar-conta.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criar Conta</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root{
      --bg-1:#111315;
      --bg-2:#1b1e22;
      --txt-1:#e8eaed;
      --txt-2:#9aa0a6;
      --bd-1:#2a2f36;
    }
    body{
      min-height:100vh;
      background:var(--bg-1);
      color:var(--txt-1);
      display:flex;
      align-items:center;
      justify-content:center;
    }
    .card-shell{
      background:var(--bg-2);
      border:1px solid var(--bd-1);
      border-radius:1rem;
      box-shadow:0 10px 30px rgba(0,0,0,.35);
      width:100%;
      max-width:480px;
    }
    .form-control{
      background:#15181c;
      border-color:var(--bd-1);
      color:var(--txt-1);
    }
    .form-control::placeholder{ color:#6b7076; }
    .input-group-text{
      background:transparent;
      color:var(--txt-2);
      border-color:var(--bd-1);
    }
    .btn-primary{ background:#6c757d; border-color:#6c757d; }
    .btn-primary:hover{ background:#5f6770; border-color:#5f6770; }
    .btn-light{ background:#e9ecef; color:#111; }
    .btn-light:hover{ background:#dfe2e6; }
    .alert{ border-radius:0.75rem; }
  </style>
</head>
<body>
  <div class="card card-shell p-4 p-md-5">
    <h2 class="h4 mb-4 text-center"><i class="bi bi-person-plus"></i> Criar Nova Conta</h2>

    <?php if ($msg != "") { ?>
      <div class="alert alert-<?php echo $tpMsg; ?> text-center">
        <strong><?php echo $msg; ?></strong>
      </div>
    <?php } ?>

    <form action="form-criar-conta.php" method="POST" autocomplete="off">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-envelope"></i></span>
          <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
        </div>
      </div>

      <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-lock"></i></span>
          <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
          <button class="btn btn-outline-light" type="button" onclick="toggle('senha', this)">
            <i class="bi bi-eye"></i>
          </button>
        </div>
      </div>

      <div class="mb-4">
        <label for="confirmar" class="form-label">Confirmar Senha</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
          <input type="password" class="form-control" id="confirmar" name="confirmar" placeholder="Confirme sua senha" required>
          <button class="btn btn-outline-light" type="button" onclick="toggle('confirmar', this)">
            <i class="bi bi-eye"></i>
          </button>
        </div>
      </div>

      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary btn-lg">
          <i class="bi bi-person-check"></i> Criar Conta
        </button>
        <a href="index.php" class="btn btn-light"><i class="bi bi-arrow-left"></i> Voltar</a>
      </div>
    </form>
  </div>

  <script>
    function toggle(id, btn){
      const el = document.getElementById(id);
      const icon = btn.querySelector('i');
      if(el.type === 'password'){
        el.type = 'text';
        icon.classList.replace('bi-eye', 'bi-eye-slash');
      }else{
        el.type = 'password';
        icon.classList.replace('bi-eye-slash', 'bi-eye');
      }
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
