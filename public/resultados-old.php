<?php 

require_once("../includes/funciones.php"); 



if (isset($_REQUEST['buscar'])) {
	
	// para poder poner en el titulo
	switch ($_REQUEST['buscarpor']) {
		case "titulo":
			$buscarpor = "Título";
			$palabras = explode(" ", $_REQUEST["busqueda"]);
			foreach ($palabras as &$palabra) 
			{
				if (strlen($palabra) >= 4)
					$palabra = "+". $palabra . "*";
				else
					$palabra = "";
			}
			unset($palabra);
			$busqueda = implode(" ", $palabras);
		 	break;
		case "tema":
			$buscarpor = "Tema";
		 	$palabras = explode(" ", $_REQUEST["busqueda"]);
			foreach ($palabras as &$palabra) 
			{
				if (strlen($palabra) >= 4)
					$palabra = "+". $palabra . "*";
				else
					$palabra = "";
			}
			unset($palabra);
			$busqueda = implode(" ", $palabras);
		 	break;
		case "issn":
			$buscarpor = "ISSN";
			$busqueda = $_REQUEST["busqueda"];
		 	break;
		case "pais":
			$buscarpor = "país";
			$busqueda = $_REQUEST["busqueda"];
		 	break;

		case "base":
			$buscarpor = "base";
			$busqueda = $_REQUEST["busqueda"];
		 	break;
	
	 	case "todo":
			$rexp = "/[0-9]{4}-[0-9]{3}[0-9xX]/"; 
			if (preg_match($rexp, $_REQUEST["busqueda"]) == 1)
			{
				$buscarpor = "ISSN";
				$_REQUEST["buscarpor"] = "issn";
				$busqueda = $_REQUEST["busqueda"];
			}
			
			else 
			{
				$buscarpor = "Todos los campos";
				$palabras = explode(" ", $_REQUEST["busqueda"]);
			foreach ($palabras as &$palabra) 
			{
				if (strlen($palabra) >= 4)
					$palabra = "+". $palabra . "*";
				else
					$palabra = "";
			}
				unset($palabra);
				$busqueda = implode(" ", $palabras);
			}
		 	break;
	}

	if ($buscarpor == "ISSN")
		$query = "call consulta('$busqueda', 'issn')";
	else 
		$query = "call consulta('$busqueda', '$_REQUEST[buscarpor]')";
		
	$resultadostodo = query($query);

	// acá todo lo de paginación
	
	// recuperar de get la paginación
	
	 //This checks to see if there is a page number. If not, it will set it to page 1 

	 if (!(isset($_REQUEST['pagenum']))) 

 	{ 

 		$pagenum = 1; 

 	} 
	
	else 
	{
		$pagenum = $_REQUEST['pagenum'];
	}


 	//Here we count the number of results 

 	//Edit $data to be your query 

	
 	$rows = count($resultadostodo); 


	 //This is the number of results displayed per page 

	 $page_rows = 15; 


	 //This tells us the page number of our last page 

 	$last = ceil($rows/$page_rows); 


	 //this makes sure the page number isn't below one, or more than our maximum pages 

	 if ($pagenum < 1) 

 	{ 

 		$pagenum = 1; 

 	} 

 	elseif ($pagenum > $last) 

	 { 

		 $pagenum = $last; 

 	} 

	// calculo variables para mostrar en los registros mostrados
	 
	$offset = ($pagenum -1) * $page_rows;
	$ultimomuestra = '';

	if ($pagenum == $last)
		$ultimomuestra = $rows;
	else 
		$ultimomuestra = $pagenum * $page_rows;


 //This sets the range to display in our query 
	
 	$max = 'limit ' . $offset .',' .$page_rows; 
	
	


	// volver a hacer query por página
	
	$query2 = "call consulta2('$busqueda', '$_REQUEST[buscarpor]', $offset, $page_rows)";

	$resultados = query("$query2");	
	
	
	// ahora sigue la parte 
	
	
	// para el caso del pais
	if ($_REQUEST['buscarpor'] == "pais") {
		$pais = query("call pais('$_REQUEST[busqueda]')");
		$titulo = $pais[0]->nombre_pais;
	}
	elseif ($_REQUEST['buscarpor'] == "base") {
		$base = query("call bases()");
		$baseid = $_REQUEST['busqueda'];
		$titulo = $base[$baseid-1]->base_nombre;
		
	}
	else
		$titulo = $_REQUEST['busqueda'];
			
	
	
	if(!empty($resultados))
	
	render("../templates/resultados.php", ["title" => "Resultados - $titulo", "resultados"=>$resultados, "buscarpor" => $buscarpor, "busqueda" => $_REQUEST['busqueda'], "pagenum"=>$pagenum, "last"=> $last, "total"=>$rows, "offset"=>$offset, "ultimomuestra"=>$ultimomuestra, "titulo" => $titulo]);
	
	
	
	else {
		// ifelse para salvar el caso que entre por issn y entonces no haya que recortar
		
		if ($buscarpor != "ISSN")
			$nobase = substr($busqueda, 1, 9);
		else
			$nobase = $busqueda;
		$redirect = "../issn/". $nobase; 
		redirect("$redirect");

		//apologize("Su consulta no ha arrojado resultados");
	
	}
}
	else 
	{
		redirect('/dondelopublico/public/index.php');
	}
	
?>

