<?php

require_once("../includes/funciones.php"); 

if (isset($_REQUEST['q'])) {
	$issnl = $_REQUEST['q'];
    $revista = query("CALL datosrev('$issnl')");
	$issns = query("CALL issns('$issnl')");
	$indices = query("CALL indices('$issnl')");
	$conicet = query("CALL conicet('$issnl')");

// hacer array con issn

	$output = array_map(function ($object) { return $object->issn; }, $issns);
	$arr_issns = implode(', ', $output);

// en el caso de que no figure en ninguna base

	if ($indices == NULL) {
		$indices = "Esta publicación no figura en ninguna base de datos";

		}

	//defino titulo asi solo porque cuando lo meto en el render da error
	$titulo =  $revista[0]->titulo;
	render("../templates/ficha.php", ["title" => "Ficha - $titulo - $issnl", "revista" => $revista, "issns" => $arr_issns, "issnl" => $issnl, "indices" => $indices, "conicet" => $conicet[0]->nivel]);
	
}

else {
	redirect('/public/index.php');

}
?>
