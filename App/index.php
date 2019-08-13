<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="view/node_modules/bootstrap/compiler/bootstrap.css">

    <link rel="stylesheet" href="view/node_modules/bootstrap/compiler/style.scss">

    <link href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" rel="stylesheet">

    <link href="view/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link href="view/css_2/simple-sidebar.css" rel="stylesheet">

    <link href="css/sb-admin-2.min.css" rel="stylesheet">

        <title>Transportadora</title>
  </head>
  <body>


	<?php

	$pagina = 'home';
	if (!empty($_GET['pagina'])) {
			$pagina = $_GET['pagina'];
		
		}
	if (file_exists("$pagina.php")) {
			# code...
			include("$pagina.php");
		} else {
			?> <i class="glyphicon glyphicon-thumbs-down"></i>Pagina não encotrada. <?php
			   
	 																	
	  } ?> 

	

 	  <script src="view/vedor/node_modules/jquery/dist/jquery.js"></script>
    <script src="view/vendor/node_modules/popper.js/dist/popper.js"></script>
    <script src="view/vendor/node_modules/bootstrap/dist/js/bootstrap.js"></script>

    <script src="view/vendor/jquery/jquery.min.js"></script>
    <script src="view/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>


  </body>
</html>