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
                <a href="#"><img src="views/img/index_logout/slides/slide1.png"></a>
                <p class="flex-caption">Slide 1</p>
            </li>
            <li>
                <a href="#"><img src="views/img/index_logout/slides/slide2.png"></a>
                <p class="flex-caption">Slide 2</p>
            </li>
            <li>
                <a href="#"><img src="views/img/index_logout/slides/slide3.png"></a>
                <p class="flex-caption">Slide 3</p>
            </li>
        </ul>
  </div>


<h1>Complat</h1>
<p>Bienvenido a COMPLAT!</p>
<p>Iniciamos nuestro primer curso de <strong>diseño de algoritmos</strong> en: </p>
<br>
<br>
<br>
<center><div class="clockdiv">
	<iframe src="http://free.timeanddate.com/countdown/i5d15sbw/n65/cf11/cm0/cu4/ct0/cs0/ca0/co0/cr0/ss0/cac333/cpc900/pcfff/tcfff/fs100/szw320/szh135/iso2016-09-14T17:35:00" allowTransparency="true" frameborder="0" width="252" height="19"></iframe>

