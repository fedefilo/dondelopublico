<?php

require_once("../includes/funciones.php"); 
$bases = query("call bases()");
render("../templates/bases2.php", ["title" =>"Búsqueda por base de datos", "bases" =>$bases]);

?>
