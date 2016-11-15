$( document ).ready(function() {
   $("#btn_unsuscribe_course").click(function(){
   		$(window).scrollTop(200);
   		$("#box_warning_unsuscribe").toggle(500);
	});
   $("#btn_unsuscribe_cancel").click(function(){
   		$("#box_warning_unsuscribe").toggle(200);
	});
});

function goUnsuscribe(){
  var connect, form, responseText, result, id_user, id_course;

  id_user = __('id_user_input').value;
  id_course = __('id_course_input').value;

  form = 'id_user=' + id_user + '&id_course=' + id_course;

  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  connect.onreadystatechange = function() {
    if(connect.readyState == 4 && connect.status == 200){
        if(connect.responseText==1){
          	result ='<div class="unsuscribe-user-success">';
            result +='Desiscrito correctamente!';    
            result +='</div>';
            __('_AJAX_UNSUSCRIBE_').innerHTML = result;
          	location.reload();
        }else{
          __('_AJAX_UNSUSCRIBE_').innerHTML = connect.responseText;
        }
    }else if(connect.readyState != 4){
      $("#btn_unsuscribe_course").hide(); 
      result ='<br>'; 
	    result += "<center><img src='views/img/loaderBar.gif' alt='Cargando...''></center>";
      result +='<div class="unsuscribe-user-info">';
      result +='Desincribiendo...';    
      result +='</div>';
	    __('_AJAX_UNSUSCRIBE_').innerHTML = result;
    }

  }
  connect.open('POST', 'ajax.php?mode=unsuscribe', true);
  connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  connect.send(form);

}