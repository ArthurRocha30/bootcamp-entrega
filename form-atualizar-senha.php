<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Atualizar Senha</title>

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
    body{ min-height:100vh; background:var(--bg-1); color:var(--txt-1); }
    .page-wrap{ min-height:100vh; display:flex; align-items:center; }
    .card-shell{
      background:var(--bg-2); border:1px solid var(--bd-1);
      border-radius:1rem; box-shadow:0 10px 30px rgba(0,0,0,.35);
    }
    .text-muted{ color:var(--txt-2)!important; }
    .input-group-text{ background:transparent; color:var(--txt-2); border-color:var(--bd-1); }
    .form-control{
      background:#15181c; border-color:var(--bd-1); color:var(--txt-1);
    }
    .form-control::placeholder{ color:#6b7076; }
    .btn-primary{ background:#6c757d; border-color:#6c757d; }
    .btn-primary:hover{ background:#5f6770; border-color:#5f6770; }
    .btn-outline-light{ border-color:#cfd4da; color:#cfd4da; }
    .btn-outline-light:hover{ background:#cfd4da; color:#111315; }
  </style>
</head>
<body>
  <div class="container page-wrap">
    <div class="row justify-content-center w-100">
      <div class="col-12 col-sm-10 col-md-7 col-lg-5">
        <div class="card card-shell">
          <div class="card-body p-4 p-md-5">
            <h1 class="h4 mb-1">Atualizar Senha</h1>
            <p class="text-muted mb-4">Defina uma nova senha para sua conta.</p>

            <?php if (!empty($_GET['ok'])) { ?>
              <div class="alert alert-success rounded-3">Senha atualizada com sucesso.</div>
            <?php } ?>
            <?php if (!empty($_GET['err'])) { ?>
              <div class="alert alert-danger rounded-3"><?php echo htmlspecialchars($_GET['err']); ?></div>
            <?php } ?>

            <form action="atualizar-senha.php" method="post" autocomplete="off">
              <input type="hidden" name="form_origem" value="atualizar_senha">

              <div class="mb-3">
                <label for="email" class="form-label">Email da conta</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                  <input type="email" class="form-control" id="email" name="email"
                         placeholder="seu@email.com" required>
                </div>
              </div>

              <div class="mb-3">
                <label for="senha_atual" class="form-label">Senha atual</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                  <input type="password" class="form-control" id="senha_atual" name="senha_atual"
                         placeholder="Digite sua senha atual" required>
                  <button class="btn btn-outline-light" type="button" onclick="toggle('senha_atual', this)">
                    <i class="bi bi-eye"></i>
                  </button>
                </div>
              </div>

              <div class="mb-3">
                <label for="nova_senha" class="form-label">Nova senha</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                  <input type="password" class="form-control" id="nova_senha" name="nova_senha"
                         placeholder="Digite a nova senha" required>
                  <button class="btn btn-outline-light" type="button" onclick="toggle('nova_senha', this)">
                    <i class="bi bi-eye"></i>
                  </button>
                </div>
              </div>

              <div class="mb-4">
                <label for="confirmar_senha" class="form-label">Confirmar nova senha</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                  <input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha"
                         placeholder="Confirme a nova senha" required>
                  <button class="btn btn-outline-light" type="button" onclick="toggle('confirmar_senha', this)">
                    <i class="bi bi-eye"></i>
                  </button>
                </div>
              </div>

              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg">
                  <i class="bi bi-key me-1"></i> Atualizar Senha
                </button>
                <a href="index.php" class="btn btn-light"><i class="bi bi-arrow-left"></i> Voltar ao login</a>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function toggle(id, btn){
      const el = document.getElementById(id);
      const icon = btn.querySelector('i');
      if(el.type === 'password'){
        el.type = 'text';
        icon.classList.remove('bi-eye'); icon.classList.add('bi-eye-slash');
      }else{
        el.type = 'password';
        icon.classList.remove('bi-eye-slash'); icon.classList.add('bi-eye');
      }
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>