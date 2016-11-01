function goEnroll() {
  var connect, form, responseText, result, id_user, id_course;

  id_user = __('id_user_input').value;
  id_course = __('id_course_input').value;

  form = 'id_user=' + id_user + '&id_course=' + id_course;

  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  connect.onreadystatechange = function() {
    if(connect.readyState == 4 && connect.status == 200){
        if(connect.responseText==1){
          	result ='<div class="enroll-user-success">';
            result +='Inscrito correctamente!';    
            result +='</div>';
            __('_AJAX_ENROLL_').innerHTML = result;
          	location.reload();
        }else{
          __('_AJAX_ENROLL_').innerHTML = connect.responseText;
        }
    }else if(connect.readyState != 4){
      $("#btn_enroll_user").hide(200);  
      result ='<div class="enroll-user-info">';
      result +='Inscribiendo...'   
      result +='</div>';
      __('_AJAX_ENROLL_').innerHTML = result;  
    }

  }
  connect.open('POST', 'ajax.php?mode=enroll', true);
  connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  connect.send(form);

}
