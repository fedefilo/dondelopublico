
<div class="list-group" style="width:40%; margin:0 auto; text-align:center">

<?php 

foreach ($bases as $fila) { ?>

  <a href="../public/resultados.php?busqueda=<?=$fila->base_id?>&buscarpor=base&buscar=Buscar" class="list-group-item"><?=$fila->base_nombre?></a>
<?php } ?>
</div>
