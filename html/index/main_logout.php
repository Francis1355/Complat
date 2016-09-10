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
     <p>Cargando...</p>
</div></center>


  <div class="flexslider" style="display: none">
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


<h1>Complat</h1>
<p>Bienvenido a COMPLAT!</p>
<p>Iniciamos nuestro primer curso de <strong>diseño de algoritmos</strong> en: </p>
<br>
<br>
<br>
<center><div class="clockdiv">
	<iframe src="http://free.timeanddate.com/countdown/i5d15sbw/n65/cf11/cm0/cu4/ct0/cs0/ca0/co0/cr0/ss0/cac333/cpc900/pcfff/tcfff/fs100/szw320/szh135/iso2016-09-14T17:35:00" allowTransparency="true" frameborder="0" width="252" height="19"></iframe>

