<?php


    // your database's name
    define("DATABASE", "");

    // your database's password
    define("PASSWORD", "");

    // your database's server
    define("SERVER", "");

    // your database's username
    define("USERNAME", "");


    /**
     * Apologizes to user with message.
     */
    function apologize($message)
    {
        render("apology.php", ["message" => $message]);
        exit;
    }

    /**
     * Facilitates debugging by dumping contents of variable
     * to browser.
     */
    function dump($variable)
    {
        require("../templates/dump.php");
        exit;
    }

    /**
     * Executes SQL statement, possibly with parameters, returning
     * an array of all rows in result set or false on (non-fatal) error.
     */
    function query($sql)
	{
    	$mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);    
    	mysqli_set_charset($mysqli,"utf8");
    	$res = $mysqli->query($sql);
    	
    	if ($res == FALSE)
		{
			return false;
		}
		else {
			if (mysqli_num_rows($res) > 0)
			{
        		$resultado = array();
        		while ($r = $res->fetch_object()) 
				{
            		$resultado []= $r;
        		}
        		return $resultado;
    		}
		}
	}
	
    
    /**
     * Redirects user to destination, which can be
     * a URL or a relative path on the local host.
     *
     * Because this function outputs an HTTP header, it
     * must be called before caller outputs any HTML.
     */
    function redirect($destination)
    {
        // handle URL
        if (preg_match("/^https?:\/\//", $destination))
        {
            header("Location: " . $destination);
        }

        // handle absolute path
        else if (preg_match("/^\//", $destination))
        {
            $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
            $host = $_SERVER["HTTP_HOST"];
            header("Location: $protocol://$host$destination");
        }

        // handle relative path
        else
        {
            // adapted from http://www.php.net/header
            $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
            $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            header("Location: $protocol://$host$path/$destination");
        }

        // exit immediately since we're redirecting anyway
        exit;
    }

    /**
     * Renders template, passing in values.
     */
    function render($template, $values = [])
    {
        // if template exists, render it
        if (file_exists("../templates/$template"))
        {
            // extract variables into local scope
            extract($values);

            // render header
            require("../templates/header.php");

            // render template
            require("../templates/$template");

            // render footer
            require("../templates/footer.php");
        }

        // else err
        else
        {
            trigger_error("Invalid template: $template", E_USER_ERROR);
        }
    }

    function file_get_contents_utf8($fn) 
    {
        $content = file_get_contents($fn);
        return mb_convert_encoding($content, 'UTF-8',
        mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));
    }
   

    function datosart($url)
    {

        $html = file_get_contents_utf8($url);


        $issn = $titulo = $revista = $autor = array();
        preg_match_all("/<div class='contenido_label_info'>([0-9]{4}-[0-9xX]{4})/", $html, $issn);
        preg_match_all("/<div class='contenido_label'>T&iacute;tulo:<\/div><div class='contenido_label_info'>(.*?)<\/div><\/div>/", $html, $titulo);
        preg_match_all("/<div class='contenido_label'>Autor\/es:<\/div><div class='contenido_label_info'>(.*?)<\/div><\/div>/", $html, $autor);
        preg_match_all("/<div class='contenido_label'>Revista:<\/div><div class='contenido_label_info'>(.*?)<\/div><\/div>/", $html, $revista);
        sleep(1);
        if(empty($issn[1][0])) { $issn[1][0] = '0000-0000'; }
        $issnn = $issn[1][0];
        $issnl = query("CALL issnl('$issnn')");
        $issnll = $issnl[0]->issnl;
        var_dump($issnll);
        $conicet = query("CALL conicet('$issnll')");
        $conicett = $conicet[0]->nivel;
        $linkdlp = "http://www.dondelopublico.com/ficha/" . $issnll;
        $datos = array("issn" => $issn[1][0], "issnl" => $issnll, "titulo" => $titulo[1][0], "revista" => $revista[1][0], "autor" => $autor[1][0], "nivel" => $conicett, "link" => $linkdlp);
        return $datos;
}

	function startsWith($haystack, $needle)
	{
     		$length = strlen($needle);
     		return (substr($haystack, 0, $length) === $needle);
	}

?>
