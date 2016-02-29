<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="msvalidate.01" content="C38CA713A15516C97D477ED3431A8EF5" />
	<title>¿Dónde lo publico? - Portal de información sobre revistas de ciencias sociales y humanidades</title>

		<link href="../public/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="../public/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link rel="icon" type="image/x-icon" href="../public/img/favicon.ico">
        <link href="../public/css/styles.css" rel="stylesheet"/>
		<script src="../public/js/jquery-1.11.1.min.js"></script>
        <script src="../public/js/bootstrap.min.js"></script>
        <script src="../public/js/scripts.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#select").val('todo');

                $("#select").on("change", function() {
                    if ( $(this).find(":selected").val() == "issn" ) {
                        $("#campo").attr("pattern", "[0-9]{4}-[0-9Xx]{4}");
                        $("#campo").attr("title", "El formato del issn es inválido");
                    }
                    else {
                        $("#campo").removeAttr("pattern");
                        $("#campo").removeAttr("title");   
                    }
                });                
            });
        </script>

</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="container">
<div id="top">
     <a href="/"><img src="../public/img/bona.jpg" alt="Dónde lo publico" width="314" height="278"/></a>
                <h1> ¿Dónde lo publico? </h1>
                <h5> La información sobre revistas de ciencias sociales que te ayuda a mejorar tus publicaciones </h5>
<br>
<br>
</div>
<div id="middle" class="form-group">
	<form action="../public/resultados.php" method="get">
		<input id="campo" class="form-control" type="text" name="busqueda">
			<select name="buscarpor" class="form-control" id="select">
				<option value="titulo">título</option>
				<option value="tema">tema</option>
            	<option value="issn">ISSN</option>
            	<option value="todo">palabra clave</option>
			</select>
		<input class="btn btn-success" name="buscar" type="submit" value="Buscar">
	</form>
    <br>
     <a class="btn btn-primary btn-sm" href="../public/pais.php">Explorar por país </a>
    <a class="btn btn-primary btn-sm" href="../public/tema.php">Explorar por tema </a><br>
    <a class="btn btn-primary btn-sm" href="../public/bases.php">Explorar por bases </a>
    <a class="btn btn-primary btn-sm" href="../public/fsigeva.php">Analizá tu SIGEVA </a>

    </div>
            <div id="bottom">
            <a  href="//facebook.com/dondelopublico" target="_blank"><img height="27" width="87" alt="FB" src="../public/img/facebook.gif"></a> 
<div class="fb-like" data-href="http://www.dondelopublico.com" data-layout="button_count" data-action="recommend" data-show-faces="true" data-share="true"></div>               <br><br>
               
               <a href="../public/faq.php"> sobre dondelopublico.com </a>- <a href = "mailto:contactoARROBINdondelopublicoPUNTOcom" 
   onclick = "this.href=this.href
              .replace(/ARROBIN/,'&#64;')
              .replace(/PUNTO/,'&#46;')"
>contacto</a> </p>
<p>2015 - <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="Licencia Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/80x15.png" /></a><br />
               </p>
            
<div>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Resultados izquierda -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-1192297656412900"
     data-ad-slot="2833935270"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>

  </div>

        </div>
<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//dondelopublico.com/piwik/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 1]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//dondelopublico.com/piwik/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-62252283-1', 'auto');
  ga('send', 'pageview');

</script>
    </body>

</html>
       
