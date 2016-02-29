<?php

require_once("../includes/funciones.php"); 

if (isset($_REQUEST['q'])) {
	$issnl = $_REQUEST['q'];
    $revista = query("CALL datosrev('$issnl')");
	$issns = query("CALL issns('$issnl')");
	$indices = query("CALL indices('$issnl')");
	$conicet = query("CALL conicet('$issnl')");
	$qualis = query("CALL qualis('$issnl')");
	$descriptores = query("CALL descriptores('$issnl')");
	


// hacer array con issn

	$output = array_map(function ($object) { return $object->issn; }, $issns);
	$arr_issns = implode(', ', $output);

// en el caso de que no figure en ninguna base

	if ($indices == NULL) {
		$indices = "Esta publicación no figura en ninguna base de datos";

		}
	if ($qualis == NULL) {
		$qualis = "Esta publicación no figura en Qualis";

		}
		// 

	//defino titulo asi solo porque cuando lo meto en el render da error
	$titulo =  $revista[0]->titulo;
	render("../templates/ficha3.php", ["title" => "$titulo - $issnl", "revista" => $revista, "qualis" => $qualis, "issns" => $arr_issns, "issnl" => $issnl, "indices" => $indices,"descriptores" => $descriptores[0]->tema,"conicet" => $conicet[0]->nivel]);
	
}

else {
	redirect('/');

}
?>
