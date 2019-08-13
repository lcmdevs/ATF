
<?php
  // require_once 'Conexao/Conetion.php';
  // include("Conexao/Conetion.php");
  // include("home.php");
?>


<!--<div class="d-flex" id="wrapper">-->

    <!-- Sidebar -->
    <!--<div class="bg-success border-right shadow rounded" id="sidebar-wrapper">
      <div class="sidebar-heading text-light font-italic">ATF Express</div>
      <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action bg-light font-weight-bolder"><i class="fa fa-home"></i> Home</a>
        
        <div class="list-group list-group-flush">
        <label class="list-group-item font-weight-bolder list-group-item-action"><i class="fa fa-folder"></i> Carregar notas
        <input type="file" class="col-9" name=""></label>
        </div>
        <a href="?pagina=home&action=notascarregadas" class="list-group-item list-group-item-action bg-light font-weight-bolder"><i class="fa fa-file" aria-hidden="true"></i> NFs</a>
        <a href="?pagine=home&action=listaNfs" class="list-group-item list-group-item-action bg-light
        font-weight-bolder"><i class="fa fa-check-square"></i> Conferência de NF</a>

        <a href="#" class="list-group-item list-group-item-action bg-light"><i class="fa fa-file-"></i></a>-->
        <!-- <a href="#" class="list-group-item list-group-item-action bg-light">Status</a> -->

        <!--<div class="card">
          <br>
          <img src="images/images.png" class="card-img-top" alt="">
          <div class="card-body">
            
          </div>
        </div>


      </div>

    </div>-->

    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <!--<div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-success border-bottom shadow rounded">
        <button class="btn btn-gradient-light text-light" id="menu-toggle"><i class="fa fa-bars"></i> </button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">-->
              <!-- <a class="nav-link text-light" href="#">Home <span class="sr-only">(current)</span></a> -->
            <!--</li>
            <li class="nav-item">-->
              <!-- <a class="nav-link" href="#">Link</a> -->
            <!--</li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Sair</a>-->
                <!-- <a class="dropdown-item" href="#">Another action</a> -->
                <!--<div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>


      </nav>

      
    <br>

    <nav class="navbar fixed-bottom navbar-light bg-light">
      <a class="navbar-brand" href="#">ATF</a>
    </nav>-->


    
        <?php
          // Definir o numero de itens por pagina
          $itens_por_paginas = 3;
          // pagina atual
          $pag = (!isset($_GET['pg']));

          // pegar produtos do banco
          $sql_code = "SELECT * FROM material LIMIT $pag, $itens_por_paginas";
          $execute = $conn->query($sql_code) or die ($conn->error);
          $material = $execute->fetch_assoc();
          $num = $execute->num_rows;

          // pegar a quantidade total de objetos no banco
          $num_total = $conn->query("SELECT*FROM material")->num_rows;

          // Definir o numero de pagina
          $num_paginas = ceil($num_total/$itens_por_paginas);
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
              <?php if($num > 0){ ?>
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
                  <?php do{ ?>
                  <tr>
                    <th scope="row"><?php echo $material['id'];?></th>
                    <td><?php echo $material['nome_modelo']; ?></td>
                    <td><?php echo $material['descricao']; ?></td>
                    <td><?php echo $material['fk_tipo']; ?></td>
                  </tr>
                  <?php } while($material = $execute->fetch_assoc()); ?>
                </tbody>
              </table>

              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <?php 
                    for($i=0; $i<$num_paginas;$i++){
                      $estilo = '';
                      if ($pag == $i)
                        $estilo = "class=\"active\"";
                  ?>
                  <li <?php echo $estilo; ?> ><a class="page-link" href="index.php?pg=<?php echo $i; ?>"><?php echo $i+1; ?></a></li>
                <?php } ?>
                
                  <li>
                    <a class="page-link" href="index.php?pg=<?php echo $num_paginas-1 ?>" aria_label="Next">
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

      

      <!--</nav>

    </div>-->