<div style="width:50%; margin:0 auto; text-align:left">
<ul class="list-group">
<li class="list-group-item"><strong><em>Título:  </em></strong> <?=$revista[0]->titulo?></li>
<li class="list-group-item"><strong><em>ISSN-L:  </em></strong><?=$issnl?></li>
<li class="list-group-item"><strong><em>ISSN asociados:  </em></strong><?=$issns?></li>
<li class="list-group-item"><strong><em>Editorial:  </em></strong><?=$revista[0]->editorial?></li>
<li class="list-group-item"><strong><em>Inicio:  </em></strong><?=$revista[0]->inicio?></li>
<li class="list-group-item"><strong><em>Descriptores:  </em></strong><?=$revista[0]->descriptores?></li>
<li class="list-group-item"><strong><em>Link:  </em></strong><a href="<?=$revista[0]->link?>" target="_blank"><?=$revista[0]->link?></a> </li>
<li class="list-group-item"><strong><em>País:  </em></strong><?=$revista[0]->nombre_pais?></li>
</ul>

    	
<table class="table table-striped" border="1">
  <tbody>
  	<tr>
    <td colspan="3" align="center"><strong>Indizaciones</strong></td>
    </tr>
    <tr>
      <th scope="col" align="center">ISSN indizado</th>
      <th scope="col" align="center">Tipo medio</th>
      <th scope="col" align="center">Base de datos</th>
    </tr>
    <?php 
	if (is_array($indices)) { 
	
    
    	 foreach ($indices as $fila) { 
?>
		<tr>
    	<td><?=$fila->issn?></td>
      <td><?=$fila->tipo?></td>
    	<td><a href="<?=$fila->ind_link?>" target="_blank"> <?=$fila->base_nombre?></a></td>
        </tr>
        <?php } }
     
	else { ?>
	    <tr>
		<td colspan="3" align="center"><?=$indices?></td>
        </tr>
    <?php } 
    if ($conicet != NULL) { ?>
		<tr>
        <td colspan="3" align="center">Nivel CONICET <a href="http://www.caicyt-conicet.gov.ar/wp-content/uploads/2014/07/CCSH_-RD-20140625-2249.pdf" target="_blank">(Res. 2249/14) </a>: Grupo <?=$conicet?></td>
        </tr>
        <?php } ?>
            
    
  </tbody>
</table>    

	
</div>    




</div>