<link rel='stylesheet' href='views/css/flexslider.css'/>
<script type='text/javascript'>

  $(window).load(function() {
    var target_flexslider = $('.flexslider');
    $('.flexslider').flexslider({
      start: function(slider){
        $('.pre-flexslider-container').css("display","none");
        $('.flexslider').css("display","block");
        slider.resize();
    }

    });

  });

  
</script>
<script src='views/js/jquery.flexslider.js'></script>

<center><div class="pre-flexslider-container">
     <img src="views/img/loaderBar.gif" alt="Cargando...">
</div></center>


  <div class="flexslider" style="display: none">
        <ul class="slides">
            <li>
                <a href="https://www.youtube.com/watch?v=ZMhfGHqn5SY"><img src="views/img/index_logout/slides/slide1.png" target="_blank"></a>
                <p class="flex-caption">Feliz navidad te desea Complat</p>
            </li>
            <li>
                <a href="?view=algorithms"><img src="views/img/index_logout/slides/slide2.png"></a>
                <p class="flex-caption">Curso básico de diseño de algoritmos ¡Ya disponible!</p>
            </li>
            <!--<li>
                <a href="#"><img src="views/img/index_logout/slides/slide3.png"></a>
                <p class="flex-caption">Slide 3</p>
            </li>-->
        </ul>
  </div>


<h1>Complat</h1>
<p>Bienvenido a COMPLAT!</p>

