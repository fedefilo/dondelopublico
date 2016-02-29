 <script>
  $(function() {
    $( "#accordion" ).accordion({
      event: "click hoverintent"
    });
  });
 
  /*
   * hoverIntent | Copyright 2011 Brian Cherne
   * http://cherne.net/brian/resources/jquery.hoverIntent.html
   * modified by the jQuery UI team
   */
  $.event.special.hoverintent = {
    setup: function() {
      $( this ).bind( "mouseover", jQuery.event.special.hoverintent.handler );
    },
    teardown: function() {
      $( this ).unbind( "mouseover", jQuery.event.special.hoverintent.handler );
    },
    handler: function( event ) {
      var currentX, currentY, timeout,
        args = arguments,
        target = $( event.target ),
        previousX = event.pageX,
        previousY = event.pageY;
 
      function track( event ) {
        currentX = event.pageX;
        currentY = event.pageY;
      };
 
      function clear() {
        target
          .unbind( "mousemove", track )
          .unbind( "mouseout", clear );
        clearTimeout( timeout );
      }
 
      function handler() {
        var prop,
          orig = event;
 
        if ( ( Math.abs( previousX - currentX ) +
            Math.abs( previousY - currentY ) ) < 7 ) {
          clear();
 
          event = $.Event( "hoverintent" );
          for ( prop in orig ) {
            if ( !( prop in event ) ) {
              event[ prop ] = orig[ prop ];
            }
          }
          // Prevent accessing the original event since the new event
          // is fired asynchronously and the old event is no longer
          // usable (#6028)
          delete event.originalEvent;
 
          target.trigger( event );
        } else {
          previousX = currentX;
          previousY = currentY;
          timeout = setTimeout( handler, 100 );
        }
      }
 
      timeout = setTimeout( handler, 100 );
      target.bind({
        mousemove: track,
        mouseout: clear
      });
    }
  };
  </script>
<div id="accordion">
<h3>¿Cómo surge DLP?</h3>
<div><p>
DLP busca ayudar a los investigadores en ciencias sociales y humanidades a contar con información confiable y actualizada sobre revistas científicas de sus áreas de trabajo. A diferencia de otras propuestas disponibles, propone presentar los datos de forma sencilla, y está orientado a los investigadores y no a profesionales de bibliotecología y ciencias de la información.
</p></div>
<h3>¿Qué revistas se incluyen? </h3>
<div><p>
En este momento incluimos revistas de ciencias sociales y humanidades en español y portugués. Más adelante incluiremos también revistas en inglés.
</p></div>
<h3>¿Qué bases de datos cubre DLP?</h3>
<div><p>
Por el momento tenemos información de 17 fuentes: ISI-Thomson Reuters (Arts & Science Citation Index, Social Science Citation Index), Scopus, SciELO, ERIH, CIRC, Francis, JSTOR, EconLit, MLA, Núcleo Básico de Revistas Argentinas, Latindex Catálogo, Historical Abstracts, Psicodoc, REDALyC, Índice mexicano de revistas de investigación, Psicodoc. Además incluimos la evaluación que realizan organismos argentinos y brasileros (CONICET y CAPES respectivamente).
</p></div>
<h3>¿Con qué frecuencia actualizan la información?</h3>
<div><p>
Si bien nuestra intención es que los datos estén lo más actualizados posibles, en este momento estamos focalizados en mejorar la interfase de la página y agregar nuevas bases de datos. El proceso de actualización no es automático y requiere trabajo. Por lo tanto, no podemos garantizar que la información esté completamente actualizada. Los invitamos a chequear las fuentes linkeadas en cada ficha para confirmar la información.
</p></div>

<h3>¿Por qué no hay libros? ¿Cómo se los evalúa?</h3>
<div><p>
Si bien los libros constituyen una parte muy importante de la producción académica en ciencias sociales y humanidades, no hay indicadores estandarizados para evaluar su calidad. Esto plantea importantes preguntas, ya que está forzando a los investigadores a un abandono del libro en favor del artículo, y genera consecuentemente un cambio en el modo de producción de las disciplinas. Es importante avanzar en modos de evaluación estandarizados sobre libros, como por ejemplo evaluar colecciones o series editadas de determinados editoriales con estándares que puedan asimilarse a las revistas. Sin embargo. no existe todavía un consenso amplio sobre este tema.
</p></div>
<h3>¿Qué dice de una revista -y qué no- su inclusión en bases de datos?</h3>
<div><p>
Cada base de datos tiene criterios propios de evaluación para determinar la inclusión de una revista en su catálogo, que se relacionan con la importancia en el campo, cantidad de citas recibidas, periodicidad, antigüedad, etc.
</p></div>
<h3>¿Qué importancia tiene esta información a la hora de decidir dónde publicar?</h3>
<div><p>
Los organismos de evaluación de la investigación utilizan las indizaciones de las revistas como un indicador de su calidad académica. A la hora de evaluar la trayectoria y producción de los investigadores, publicar en revistas con más y mejores indizaciones es interpretado como una señal de mayor calidad.
</p></div>
<h3>¿Cuáles son los criterios de evaluación en mi país?</h3>
<div><p>
Cada organismo tiene sus propios criterios. En Argentina existe el Núcleo Básico de Revistas Científicas, en México el índice mexicano de revistas de investigación, en Brasil el índice Qualis de CAPES. Cada comisión de evaluación sin embargo puede marcar sus propios criterios, que suelen estar basados en el perfil de indización de las revistas.
</p></div>
<h3>¿Cómo se determina a qué grupo CONICET pertenece una revista?</h3>
<div><p>
La información que figura en DLP sobre la evaluación de CONICET de una revista se basa en los criterios de la resolución 2249/14. CONICET no ha publicado una lista con los títulos de las revistas pertenecientes a cada grupo. En esta página se calcula ese dato basado en las indizaciones, pero no debe tomarse en modo alguno como un dato oficial o definitivo que se vaya a implementar mecánicamente en las evaluaciones de ese organismo.
</p></div>
<h3> La bibliometría está arruinando la investigación en ciencias sociales y humanidades, ¿por qué contribuyen a afianzarla?</h3>
<div><p>
Creemos que la bibliometría llegó para quedarse. Sería ingenuo resistirla como un todo. Lo que hay que intentar es incluir nuevos indicadores que reflejen aspectos que interesan a las ciencias sociales y humanidades iberoamericanas. Más adelante trabajaremos en la construcción de indicadores que puedan visibilizar globalmente la producción publicada en las revistas y libros de la región.
</p></div>

<h3> Vi un error en la información de la página, ¿lo pueden corregir?</h3>
<div><p>
Sí, claro. Envíen un mail a contacto arroba dondelopublico punto com.
</p></div>
</div>
