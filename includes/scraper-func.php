<?php

function datosart($url)
{

	$html = file_get_contents($url);

	$issn = $titulo = $revista = $autor = array();
	preg_match_all("/<div class='contenido_label_info'>([0-9]{4}-[0-9xX]{4})/", $url, $issn);
	preg_match_all("/<div class='contenido_label'>T&iacute;tulo:<\/div><div class='contenido_label_info'>(.*?)<\/div><\/div>/", $url, $titulo);
	preg_match_all("/<div class='contenido_label'>Autor\/es:<\/div><div class='contenido_label_info'>(.*?)<\/div><\/div>/", $url, $autor);
	preg_match_all("/<div class='contenido_label'>Revista:<\/div><div class='contenido_label_info'>(.*?)<\/div><\/div>/", $url, $revista);

	var_dump($issn, $titulo, $revista, $autor);

}