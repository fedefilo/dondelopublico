<?php

require_once("../includes/funciones.php"); 

if (isset($_REQUEST['q'])) {

	$q = $_REQUEST['q'];
	$issnl = query("CALL issnl('$q')");
	
// chequea si el issn está bien formado
if ($issnl == FALSE)
	apologize("No tenemos información sobre la consulta $q");

	$issnl = $issnl[0]->issnl;
	$issns = query("CALL issns('$issnl')");
	$indices = query("CALL nobase('$issnl')");
	$conicet = query("CALL conicet('$issnl')");
	


// hacer array con issn

	$output = array_map(function ($object) { return $object->issn; }, $issns);
	$arr_issns = implode(', ', $output);

// en el caso de que no figure en ninguna base

if ($indices == NULL) 
	$indices = "Esta publicación no figura en ninguna base de datos";



	render("../templates/nobase.php", ["title" => "Ficha - $issnl", "issns" => $arr_issns, "issnl" => $issnl, "indices" => $indices, "conicet" => $conicet[0]->nivel]);
	
}

else {
	redirect('/');

}
?>
