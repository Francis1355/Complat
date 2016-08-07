function goLogin() {
  var connect, form, responseText, result, user, pass, sesion;

  user = __('user_login').value;
  pass = __('pass_login').value;
  sesion = __('session_login').checked ? true : false;

  form = 'user=' + user + '&pass=' + pass + '&sesion=' + sesion;

  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  connect.onreadystatechange = function() {
    if(connect.readyState == 4 && connect.status == 200){
        if(connect.responseText==1){
          	result ='<div class="warning-success">';
            result +='<div class="div-icon-warning">';
            result +='<span class="icon-exclamation"></span>';
            result +='</div>';
            result +='<div class="div-texto-warning">';
            result +='<p class="p-texto-warning">Redireccionando...</p>';
            result +='</div>';    
            result +='</div>';
            __('_AJAX_LOGIN_').innerHTML = result;
          	location.reload();
        }else{
          __('_AJAX_LOGIN_').innerHTML = connect.responseText;
        }
    }else if(connect.readyState != 4){
	    result ='<div class="warning-info">';
	    result +='<div class="div-icon-warning">';
	    result +='<span class="icon-exclamation"></span>';
	    result +='</div>';
	    result +='<div class="div-texto-warning">';
	    result +='<p class="p-texto-warning">Estamos intentando iniciar sesión...</p>';
	    result +='</div>';    
	    result +='</div>';
	    _('_AJAX_LOGIN_').innerHTML = result;
    }

  }
  connect.open('POST', 'ajax.php?mode=login', true);
  connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  connect.send(form);

}
function runScriptLogin(e) {
  if(e.keyCode == 13){
    goLogin();
}

}
