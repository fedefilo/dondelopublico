<div style="width:40%; margin:0 auto; text-align:center">
<h5> Búsqueda: <em>"<?=$titulo ?>"</em> en <?=$buscarpor ?> </h5>
<h5> Total: <?=$total?> registros. </h5>
<br>
<h6> Mostrando <?=$offset+1?> - <?=$ultimomuestra?> registros </h6>  

<br>
<br>
<br>
</div>
<div style="width:40%; margin:0 auto; text-align:left">

<table class="table table-striped">
	<thead>
    <tr>
        <th> Título </th>
        <th> ISSN-L </th>
	</tr>
    </thead>
    
    <tbody>
    <?php 
	// imprime en un div cada resultado
foreach ($resultados as $fila) {
    ?>
    <tr>
	<td style="text-align:left"><a href="../ficha/<?=$fila->issnl?>"><?= $fila->titulo?></a></td> 
    <td style="text-align:left"><?=$fila->issnl?></td>
    </tr>
	<?php } ?>
	</tbody>
</table>
</div>
<div id="paginador" style="width:40%; margin:0 auto; text-align:center">

<!-- // This shows the user what page they are on, and the total number of pages -->

 <p>  Página <?=$pagenum?> de <?=$last?> </p>
 


  <?php
 // First we check if we are on page one. If we are then we don't need a link to the previous page or the first page so we do nothing. If we aren't then we generate links to the first page, and to the previous page.

$params = $_GET;


 if ($pagenum == 1) 

 {

 } 

 else 

 {
 
 $params['pagenum'] = 1;
 $paramString = http_build_query($params);

 
 ?>
   <a href='<?=$_SERVER['PHP_SELF'].'?'.$paramString?>'> <<-Primera</a> 
   
   <?php


 $previous = $pagenum-1;
 $params['pagenum'] = $previous;
 $paramString = http_build_query($params);

 ?>
   
   <a href='<?=$_SERVER['PHP_SELF'].'?'.$paramString?>'> <-Anterior</a>
  <?php
 } 



 //This does the same as above, only checking if we are on the last page, and then generating the Next and Last links

	

 if ($pagenum == $last) 

 {

 } 

 else {

 $next = $pagenum+1;
 $params['pagenum'] = $next;
 $paramString = http_build_query($params);


?>
   <a href='<?=$_SERVER['PHP_SELF'].'?'.$paramString?>'>Siguiente ->   </a> 
   
   
<?php

 $params['pagenum'] = $last;
 $paramString = http_build_query($params);
?>   
   <a href='<?=$_SERVER['PHP_SELF'].'?'.$paramString?>'>Última ->></a></p>
 
 <?php
 } 

 ?> 
</div>

