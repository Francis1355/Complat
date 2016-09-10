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

<div class="flexslider">
      <ul class="slides">
          <li>
              <a href="?view=quienes_somos"><img src="views/img/index_logout/slides/slide1.jpg"></a>
              <p class="flex-caption"></p>
          </li>
          <li>
              <a href="?view=lineamientos"><img src="views/img/index_logout/slides/slide2.jpg"></a>
              <p class="flex-caption"></p>
          </li>
          <li>
              <a href="?view=aviso"><img src="views/img/index_logout/slides/slide3.jpg"></a>
              <p class="flex-caption"></p>
          </li>
          </ul>
</div>

<h2>Mis cursos:</h2>