
<script> $("#log").html("") </script>

<div id="accordion" style="width:65%; margin:0 auto; text-align:left">

  

  


	<h3><a name="indices"></a> Análisis de publicaciones de <?=$titular?> </h3>
    <div>
    <table class="table table-striped" border="1">
  <tbody>
     <tr>
      <th scope="col" align="center" class="">Título</th>
      <th scope="col" align="center" class="">Autor/es</th>
      <th scope="col" align="center" class="">Revista</th>
      <th scope="col" align="center" class="">ISSN</th>
      <th scope="col" align="center" class="">Ficha DLP</th>
      <th scope="col" align="center" class="">Nivel CONICET</th>
    </tr>
    <?php 
	if (is_array($datos_art)) { 
	
    
    	 foreach ($datos_art as $fila) { 
?>
		<tr>
    	<td><?=$fila['titulo']?></td>
      <td><?=$fila['autor']?></td>
      <td><?=$fila['revista']?></td>
      <td><?=$fila['issnl']?></td>
      <td><a href="<?=$fila['link']?>" target="_blank"> Ficha </a></td>
      <td><?php if(empty($fila['nivel'])) { echo "s/d"; } else { echo $fila['nivel'];} ?></td> 
        </tr>
        <?php } }
     
	else { ?>
	    <tr>
		<td colspan="3" align="center">ERROR</td>
        </tr>
    <?php } ?>
	</tbody></table>
    </div>

  <h3>Resumen </h3>
  <h4> Artículos nivel 1: <strong> <?=$n1?> </strong> </h4>
  <h4> Artículos nivel 2: <strong> <?=$n2?> </strong> </h4>
  <h4> Artículos nivel 3: <strong> <?=$n3?> </strong> </h4>
  <h4> Artículos sin información: <strong> <?=$nn?> </strong> </h4>
  <h4> Artículos analizados  <strong><?=$n1+$n2+$n3+$nn?></strong> </h4>


</div>