
<div class="list-group" style="width:40%; margin:0 auto; text-align:center">

<?php 

foreach ($bases as $fila) { ?>

  <a href="../public/resultados.php?busqueda=<?=$fila->base_id?>&buscarpor=base&buscar=Buscar" class="list-group-item"><h4><?=$fila->base_nombre?></h4></a>
<p class="list-group-item-text"><?=$fila->base_descripcion?></p>
  
<?php } ?>
</div>
