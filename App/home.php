<?php
include("Conexao/Conetion.php");
?>
<div class="d-flex" id="wrapper">
  <!-- Sidebar -->
  <div class="bg-success border-right shadow rounded" id="sidebar-wrapper">
    <div class="sidebar-heading text-light font-italic">ATF Express</div>
    <div class="list-group list-group-flush">
      <a href="index.php" class="list-group-item list-group-item-action bg-light font-weight-bolder"><i class="fa fa-home"></i> Home</a>
      <div class="list-group list-group-flush">
        <label class="list-group-item font-weight-bolder list-group-item-action"><i class="fa fa-folder"></i> Carregar notas
          <form action="model/upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" class="col-9" name="ufile"></label><br>
        <input type="submit" class="col-5" style="margin-left: 15px;" value="Upload" />
        </form>
      </div>
      <a href="?pagina=home&action=notascarregadas" class="list-group-item list-group-item-action bg-light font-weight-bolder">
        <i class="fa fa-file" aria-hidden="true"></i> NFs</a>
      <a href="?pagine=home&action=listaNfs" class="list-group-item list-group-item-action bg-light font-weight-bolder">
        <i class="fa fa-check-square"></i> Conferência de NF</a>
      <div class="card">
        <br>
        <img src="images/images.png" class="card-img-top" alt="">
        <div class="card-body">
        </div>
      </div>
    </div>
  </div>
  <div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-success border-bottom shadow rounded">
      <button class="btn btn-gradient-light text-light" id="menu-toggle"><i class="fa fa-bars"></i> </button>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item active">
          </li>
          <li class="nav-item">
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Sair</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <br>
    <nav class="navbar fixed-bottom navbar-light bg-light">
      <a class="navbar-brand" href="#">ATF</a>
    </nav>

    <?php

    $action = '';
    if (!empty($_GET['action'])) {
      $action = $_GET['action'];
    }
    if ($action == 'notascarregadas') {
      ?>

    <?php
      // Definir o numero de itens por pagina
      $itens_por_paginas = 7;
      // pagina atual
      $pag = intval($_GET['pg']);

      // pegar produtos do banco
      $sql_code = "SELECT * FROM arq_arquivo LIMIT $pag, $itens_por_paginas";
      $execute = $mysqli->query($sql_code) or die($mysqli->error);
      $arquivo = $execute->fetch_assoc();
      $num = $execute->num_rows;

      // pegar a quantidade total de objetos no banco
      $num_total = $mysqli->query("SELECT * FROM arq_arquivo")->num_rows;

      // Definir o numero de pagina
      $num_paginas = ceil($num_total / $itens_por_paginas);
      ?>

    <div class="container-fluid">
      <div class="card">
        <div class="">
          <ol class="breadcrumb">
            <il class="breadcrumb-item">
              <a href="index.php">Home</a>
            </il>
            <li class="breadcrumb-item active">
              Notas
            </li>
          </ol>
        </div>
        <div class="container-fluid">
          <br>
          <?php if ($num > 0) { ?>
          <table class="table table-bordered text-center">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">NFe</th>
                <th colspan="">Rementente</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php do { ?>
              <tr>
                <th scope="row"><?php echo $arquivo['CODIGO']; ?></th>
                <td><?php echo $arquivo['NFE']; ?></td>
                <td><?php echo $arquivo['REMETENTE']; ?></td>
                <td><?php echo $arquivo['STATUS']; ?></td>
              </tr>
              <?php } while ($arquivo = $execute->fetch_assoc()); ?>
            </tbody>
          </table>

          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item">
                <a class="page-link" href="index.php?pg=0" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <?php
                  for ($i = 0; $i < $num_paginas; $i++) {
                    $estilo = '';
                    if ($pag == $i)
                      $estilo = "class=\"active\"";
                    ?>
              <li <?php echo $estilo; ?>><a class="page-link" href="index.php?pg=<?php echo $i; ?>"><?php echo $i + 1; ?></a></li>
              <?php } ?>

              <li>
                <a class="page-link" href="index.php?pg=<?php echo $num_paginas - 1 ?>" aria_label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
          <?php } ?>
        </div>
        <br>
        <div class="card-footer text-muted text-center">
          ATF Express
        </div>
      </div>
    </div>

    <?php
    }
    // Tabela de notas
    if ($action == 'listaNfs') {
     
      $conn = new Conexao();
      
      $conn->conectar();
    
     $sql = $pdo->prepare("SELECT * FROM arq_arquivo;");
     $sql->execute();
     $dados = $sql->fetch();

      ?>
    <div class="container-fluid">
      <div class="card">
        <div class="">
          <ol class="breadcrumb">
            <il class="breadcrumb-item">
              <a href="index.php">Home</a>
            </il>
            <li class="breadcrumb-item active">
              Lista de notas
            </li>
          </ol>
        </div>
        <div class="container-fluid">
          <br>
          <?php
          while ($dados = $sql->fetch()) {
            ?>
          <table class="table table-bordered text-center table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">NFe</th>
                <th scope="col">Remeten</th>
                <th scope="col">QTD</th>
                <th>Conferir</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th><?php echo $dados['CODIGO'] ?></th>
                <td><?php echo $dados['NFE'] ?></td>
                <td><?php echo $dados['REMETENTE'] ?></td>
                <td><?php echo $dados['CODIGO'] ?></td>
                <td><a href="?pagina=home&action=conferencia"><?php echo '<button class="btn btn-gradient-light btn-sm"><i class="fa fa-file"></i></button>' ?></a></td>
              </tr>
            </tbody>
          </table>
          <?php } ?>
        
        </div>
        <br>
        <div class="card-footer text-muted text-center">
          ATF Express
        </div>
      </div>
    </div>
    <?php
    }

    if ($action == 'conferencia') {
      ?>
    <div class="container-fluid">
      <div class="card">
        <div class="">
          <ol class="breadcrumb">
            <il class="breadcrumb-item">
              <a href="index.php">Home</a>
            </il>
            <li class="breadcrumb-item active">
              Conferência
            </li>
          </ol>
        </div>

        <br>

        <div class="container-fluid">
          <table class="table table-bordered text-center table-sm">
            <thead>
              <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Descrição</th>
                <th scope="col">QTD</th>
                <th scope="col">Qtd Conferido</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">3145</th>
                <td>Porduto rrrrrrrrrrrrrrrrrrr</td>
                <td>5</td>
                <td>3</td>
              </tr>
            </tbody>
          </table>

          <form class="form-inline my-2 my-lg-0" style="margin-left: 806px;">
            <div class="form-group">
              <input type="" name="" class="from-control mr-sm-2">
            </div>
            <button class="btn btn-success btn-sm my-2 my-sm-0"> Finalizar</button>
          </form>

        </div>



        <br>
        <div class="card-footer text-muted text-center">
          ATF Express
        </div>

      </div>
    </div>
    <?php
    }


    ?>

    </nav>

  </div>