<?php include("validar-session.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lista de Tarefas</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root{
      --bg-1:#111315;
      --bg-2:#1b1e22;
      --txt-1:#e8eaed;
      --txt-2:#9aa0a6;
      --bd-1:#2a2f36;
      --row:#15181c;
    }
    body{ min-height:100vh; background:var(--bg-1); color:var(--txt-1); }
    .page-wrap{ padding-top:32px; padding-bottom:32px; }
    .card-shell{
      background:var(--bg-2); border:1px solid var(--bd-1);
      border-radius:1rem; box-shadow:0 10px 30px rgba(0,0,0,.35);
    }
    .btn-primary{ background:#6c757d; border-color:#6c757d; }
    .btn-primary:hover{ background:#5f6770; border-color:#5f6770; }
    .table{
      color:var(--txt-1); margin:0;
    }
    .table thead th{
      color:var(--txt-2); border-color:var(--bd-1); font-weight:600;
      text-transform:uppercase; letter-spacing:.02em; font-size:.85rem;
    }
    .table tbody td{ border-color:var(--bd-1); background:var(--row); }
    .table tbody tr:hover td{ background:#1a1e23; }
    .muted{ color:var(--txt-2); }
  </style>
</head>
<body>
  <div class="container page-wrap">
    <div class="card card-shell">
      <div class="card-body p-4">

        <div class="d-flex align-items-center justify-content-between mb-3">
          <div>
            <h1 class="h4 mb-1">Lista de Tarefas</h1>
            <div class="muted">Gerencie suas publicações</div>
          </div>

          <div class="d-flex gap-2">
            <?php if ($id_admin > 0) { ?>
              <a href="form-tarefa.php" class="btn btn-success"><i class="bi bi-plus-lg"></i> Nova Publicação</a>
              <a href="logoff.php" class="btn btn-danger"><i class="bi bi-box-arrow-right"></i> Sair</a>
            <?php } ?>
            <a href="index.php" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Voltar</a>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table table-hover align-middle">
            <thead>
              <tr>
                <th width="70%">Título</th>
                <th class="text-center">Acessar</th>
              </tr>
            </thead>
            <tbody>
              <?php
                include("conectar.php");
                $sql   = "select * from tarefa;";
                $resut = conectar($sql);
                while($linha = $resut->fetch_assoc()){
                  $id = $linha['id'];
                  $t  = $linha['titulo'];
                  echo '<tr>';
                  echo '  <td>'.htmlspecialchars($t).'</td>';
                  echo '  <td class="text-center"><a class="btn btn-outline-light btn-sm" href="tarefa.php?id='.$id.'"><i class="bi bi-box-arrow-up-right"></i></a></td>';
                  echo '</tr>';
                }
              ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>