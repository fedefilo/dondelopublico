<?php

require("../includes/funciones.php");

if ($_SERVER["REQUEST_METHOD"] != "POST")
{
	// else render form
    redirect("/");
}


// tomar el url de post
$url = $_REQUEST['link'];


// chequear formato

if (startsWith($url, "http://www.conicet.gov.ar/new_scp/detalle.php") === FALSE and startsWith($url, "www.conicet.gov.ar/new_scp/detalle.php") === FALSE)
{
	apologize("El URL no tiene el formato adecuado");
}


// extraer el ID

$matches = array();
preg_match('/id=([0-9]+)/', $url, $matches);
$idpersona = $matches[1];



// armar el URL de la página de articulos de ese ID

$pag_art = "http://www.conicet.gov.ar/new_scp/detalle.php?id=" . $idpersona . "&articulos=yes";

// bajar la página de articulos

$html = file_get_contents($pag_art);

// header para permitir flush
header( 'Content-type: text/html; charset=utf-8' );


// nombre del consultado

preg_match_all("/<div class='titulo_nombre'>(.*?)<\/span><\/div>/", $html, $arnomb);
$titular = $arnomb[1][0];
echo "<div id=\"log\">Analizando artículos de $titular...<br/>";


// insertar log en BD
query("CALL consultas_sigeva('$url', '$titular', '$_REQUEST[mail]')");

// flush

flush();
ob_flush();

// urls artículos

preg_match_all("/art_id=([0-9]*)/", $html, $idart);
$url_arts = array();

// chequear si tiene articulos

if (empty($idart[0]))
{
	apologize("El perfil no tiene artículos asociados");
}


// armar URL de cada artículo

foreach($idart[1] as $fila)
{
	$url_arts[] = "http://www.conicet.gov.ar/new_scp/detalle.php?id=" . $idpersona . "&articulos=yes&detalles=yes&art_id=" . $fila;

}


// saco los datos de cada artículo

$nroarts = count($url_arts);
echo "$nroarts artículos encontrados...<br/>";
$artact = 1;
// flush
flush();
ob_flush();


foreach($url_arts as $fila)
{
	ob_start();
	$datos_art[] = datosart($fila);
	ob_end_clean();
	echo "Analizando artículo $artact de $nroarts...<br/>";
	// flush
    	flush();
    	ob_flush();

	$artact++;
  
}

echo "Listo!<br/></div>";
// flush final y delete
flush();
ob_flush();
sleep(1);
ob_end_clean();


// calcular niveles 

$n1 = $n2 = $n3 = $nn = 0;

foreach($datos_art as $fila)
{
	switch($fila['nivel'])
	{
		case 1:
			$n1 = $n1+1;
			break;
		case 2:
			$n2 = $n2+1;
			break;
		case 3:
			$n3 = $n3+1;
			break;
		default:
			$nn = $nn + 1;
			break;
	}
}

render("../templates/sigeva.php", ["title" =>"Análisis de publicaciones de $titular", "datos_art" => $datos_art, "titular" => $titular, "n1" => $n1, "n2" => $n2, "n3" => $n3, "nn" => $nn]);

// guardar los datos en la BD

// consultar la base de datos "donde" para cada revista 

// armar un array con los datos de indizacion y los datos sacados de sigeva

// armar el template para el output 



?>