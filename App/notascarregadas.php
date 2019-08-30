
    
        <?php
          // Definir o numero de itens por pagina
          $itens_por_paginas = 3;
          // pagina atual
          $pag = (!isset($_GET['pg']));
       
          // pegar produtos do banco
          $sql_code = "SELECT * FROM arq_arquivo LIMIT $pag, $itens_por_paginas";
          $execute = $conn->query($sql_code) or die ($conn->error);
          $arquivo = $execute->fetch_assoc();
          $num = $execute->num_rows;

          // pegar a quantidade total de objetos no banco
          $num_total = $conn->query("SELECT*FROM arq_arquivo")->num_rows;

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
                    <th scope="row"><?php echo $arquivo['CODIGO'];?></th>
                    <td><?php echo $arquivo['NFE']; ?></td>
                    <td><?php echo $arquivo['REMETENTE']; ?></td>
                    <td><?php echo $arquivo['STATUS']; ?></td>
                  </tr>
                  <?php } while($arquivo = $execute->fetch_assoc()); ?>
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