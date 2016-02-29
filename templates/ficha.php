<script>

$(document).ready(function(){
    $("#tituloq").click(function(){
        $(".qualis").toggle();
    });
});

</script>

<style>
.blogShort{ border-bottom:1px solid #ddd;}
.add{background: #333; padding: 10%; height: 300px;}

.nav-sidebar { 
    width: 100%;
    padding: 20px 0; 
    border-right: 1px solid #ddd;
}
.nav-sidebar a {
    color: #333;
    -webkit-transition: all 0.08s linear;
    -moz-transition: all 0.08s linear;
    -o-transition: all 0.08s linear;
    transition: all 0.08s linear;
}
.nav-sidebar .active a { 
    cursor: default;
    background-color: #0b56a8; 
    color: #fff; 
}
.nav-sidebar .active a:hover {
    background-color: #E50000;   
}
.nav-sidebar .text-overflow a,
.nav-sidebar .text-overflow .media-body {
    white-space: nowrap;
    overflow: hidden;
    -o-text-overflow: ellipsis;
    text-overflow: ellipsis; 
}

.btn-blog {
    color: #ffffff;
    background-color: #E50000;
    border-color: #E50000;
    border-radius:0;
    margin-bottom:10px
}
.btn-blog:hover,
.btn-blog:focus,
.btn-blog:active,
.btn-blog.active,
.open .dropdown-toggle.btn-blog {
    color: white;
    background-color:#0b56a8;
    border-color: #0b56a8;
}
article h2{color:#333333;}
h2{color:#0b56a8;}
 .margin10{margin-bottom:10px; margin-right:10px;}
 
 .container .text-style
{
  text-align: justify;
  line-height: 23px;
  margin: 0 13px 0 0;
  font-size: 19px;
}
</style>

<div class="container">
	<div class="col-sm-2" style="position:fixed">
    <nav class="nav-sidebar">
		<ul class="nav tabs">
          <li><a href="#datos">Datos de la revista</a></li>
          <li><a href="#indices">Indizaciones</a></li>
          <li><a href="#orgs">Evaluación de organismos nacionales</a></li>                               
		</ul>
	</nav>
		
</div>


<div id="accordion" style="width:55%; margin:0 auto; text-align:left">

  

	<h3><a name="datos"></a> Datos de la revista </h3>
	<div>
		<ul class="list-group">
        <li class="list-group-item"><strong><em class="">Título:  </em></strong> <?=$revista[0]->titulo?></li>
        <li class="list-group-item  "><strong><em class="">ISSN-L:  </em></strong><?=$issnl?></li>
        <li class="list-group-item  "><strong><em class="">ISSN asociados:  </em></strong><?=$issns?></li>
        <li class="list-group-item  "><strong><em class="">Editorial:  </em></strong><?=$revista[0]->editorial?></li>
        <li class="list-group-item  "><strong><em class="">Inicio:  </em></strong><?=$revista[0]->inicio?></li>
        <li class="list-group-item  "><strong><em class="">Descriptores:  </em></strong><?=$revista[0]->descriptores?></li>
        <li class="list-group-item  "><strong><em class="">Link:  </em></strong><a href="<?=$revista[0]->link?>" target="_blank"><?=$revista[0]->link?></a> </li>
        <li class="list-group-item  "><strong><em class="">País:  </em></strong><?=$revista[0]->nombre_pais?></li>
        </ul>
	</div>

   


	<h3><a name="indices"></a> Datos de indización </h3>
    <div>
    <table class="table table-striped" border="1">
  <tbody>
     <tr>
      <th scope="col" align="center" class="">ISSN indizado</th>
      <th scope="col" align="center" class="">Tipo medio</th>
      <th scope="col" align="center" class="">Base de datos</th>
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
    <?php } ?>
	</tbody></table>
    </div>



	<h3> <a name="orgs"></a>Evaluación de organismos nacionales de ciencia y técnica</h3>
    <div>
    <table class="table table-striped" border="1">
	 <tbody>
    
    <?php
    if ($conicet != NULL) { ?>
		<tr>
        <td colspan="3" align="center"><strong>Nivel CONICET <a href="http://www.caicyt-conicet.gov.ar/wp-content/uploads/2014/07/CCSH_-RD-20140625-2249.pdf" target="_blank">(Res. 2249/14) </a></strong>: Grupo <?=$conicet?></td>
        </tr>
        
        
        <?php } 
    if (is_array($qualis)) { ?>
		<tr id="tituloq" style="cursor:pointer">
        <td colspan="3" align="center"> Datos base <a href="http://qualis.capes.gov.br/webqualis/" target="_blank">Qualis-CAPES</a> (Brasil) <span class="sign"></span> </td>
        </tr>
        
            <tr class="qualis">
      <th scope="col" align="center" class="">ISSN indizado</th>
      <th scope="col" align="center" class="">Estrato</th>
      <th scope="col" align="center" class="">Campo</th>
     </tr>

        <?php 
         foreach ($qualis as $fila) { 
?>
		<tr class="qualis">
    	<td><?=$fila->issn?></td>
        <td><?=$fila->estrato?></td>
        <td><?=$fila->campo?></td>
         </tr>
        <?php } }
     
	else { ?>
	    <tr class="qualis">
		<td colspan="3" align="center"><?=$qualis?></td>
        </tr>
    <?php }  ?>
        
	</tbody>
	</table>
    </div>    

	




</div>