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



<div class="courses">
    <!--<div class="course">
      <span class="course-enrolled-icon"></span>
      <img class="course-img" src="courses_assets/algorithms/img/div_img_course.png" alt="Algoritmos">
      <h4 class="course-title">Diseño de algoritmos</h4>
      <p class="course-description">Lorem ipsum dolor sit amet lorem ipsum dolor sit amet.</p>
    </div>-->

    <?php 
      //Inicia conexion con base de datos cargar cursos de programacion 
      //TODO: Cargar porcentaje de avance de curso 
      $id_user = $users[$_SESSION['app_id']]['id_user'];
      $db = new Conexion();
      $sql = $db->query("SELECT * FROM course;");
      if($db->rows($sql) > 0){
        echo "<h2>Mis cursos:</h2>";
        $flagCourse = false;
        while ($datos = $db->recorrer($sql)) {
          $id_course = $datos[0];
          $sql_2 = $db->query("SELECT * FROM rel_user_course_score WHERE id_course ='$id_course' AND id_user='$id_user';");
          if($db->rows($sql_2) == 1){ //Si existe la relacion 
            $flagCourse = true;
            echo  '<a href="'.$datos[5].'" class="course-a">
                <div class="course">
                  <span class="course-enrolled-icon"></span>
                  <img class="course-img" src="'.$datos[6].'" alt="'.$datos[1].'"/>
                  <h4 class="course-title">'.$datos[1].'</h4>
                  <p class="course-description">'.$datos[2].'</p>
                </div>
              </a>'; 
          }
        }
        if(!$flagCourse){
          echo "Usted no esta inscrito en ningun curso.";
        }
      }


      $db->liberar($sql);
      $db->liberar($sql_2);
      $db->close();

    ?>
    
  </div>