<?php
include('conectar.php');
include('validar-session.php');

$titulo = $descricao = $id_publicacao = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql   = "select * from tarefa where id = $id;";
    $resut = conectar($sql);
    if ($linha = $resut->fetch_assoc()) {
        $titulo    = $linha['titulo'];
        $descricao = $linha['descricao'];
        $id_publicacao = $linha['id'];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tarefa</title>

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
    .page-wrap{ padding-top:32px; padding-bottom:32px; }
    .card-shell{
      background:var(--bg-2); border:1px solid var(--bd-1);
      border-radius:1rem; box-shadow:0 10px 30px rgba(0,0,0,.35);
    }
    .muted{ color:var(--txt-2); }
    .content{
      white-space:pre-wrap;      
      line-height:1.6;
    }
    .btn-secondary{ background:#6c757d; border-color:#6c757d; }
    .btn-secondary:hover{ background:#5f6770; border-color:#5f6770; }
  </style>
</head>
<body>
  <div class="container page-wrap">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10">
        <div class="card card-shell">
          <div class="card-body p-4 p-md-5">

            <div class="d-flex align-items-start justify-content-between gap-3">
              <div>
                <h1 class="h4 mb-1">
                  <?php echo htmlspecialchars($titulo ?: 'Tarefa'); ?>
                </h1>
                <div class="muted">Detalhes da publicação</div>
              </div>
              <div class="d-flex gap-2">
                <a href="listar-tarefas.php" class="btn btn-secondary">
                  <i class="bi bi-arrow-left"></i> Voltar
                </a>
              </div>
            </div>

            <hr class="my-4" style="border-color:var(--bd-1)">

            <div class="content">
              <?php echo nl2br(htmlspecialchars($descricao ?: 'Sem descrição.')); ?>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>