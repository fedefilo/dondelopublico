<!DOCTYPE html>

<html>

    <head>
		<meta charset="utf-8">
        <link href="../public/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="../public/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="../public/css/styles.css" rel="stylesheet"/>
        <link href="/../public/js/jquery-ui.css" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="../public/img/favicon.ico">

        <?php if (isset($title)): ?>
            <title> <?= htmlspecialchars($title) ?> - Dónde lo publico</title>
        <?php else: ?>
            <title>Dónde lo publico</title>
        <?php endif ?>

        <script src="../public/js/jquery-1.11.1.min.js"></script>
        <script src="../public/js/bootstrap.min.js"></script>
        <script src="../public/js/scripts.js"></script>
        <script src="/../public/js/jquery-ui.js"></script>

    </head>

    <body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">¿Dónde lo publico?</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
        <li><a href="../public/faq.php">Sobre DLP</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Descubrí revistas <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="../public/pais.php">Por país</a></li>
            <li><a href="../public/tema.php">Por tema</a></li>
            <li><a href="../public/bases.php">Por base de datos</a></li>
          </ul>
          <li><a href="../public/fsigeva.php">Analizá tu SIGEVA</a></li>
        </li>
      </ul>
         
         
         <form class="navbar-form navbar-right" role="search" action="../public/resultados.php" method="get">
          <div class="form-group">
          <input type="text" class="form-control" placeholder="Título, tema, ISSN" name="busqueda">
          <input type="hidden" class="form-control" name="buscarpor" value="todo">
          
        </div>
        <button name="buscar" type="submit" value="Buscar" class="btn btn-primary">Buscar</button>
      </form>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
            <div id="middle">

