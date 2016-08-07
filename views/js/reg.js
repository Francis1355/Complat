//var registro = false; 
function goReg() {
  var connect, form, responseText, result, user, pass1, pass2, tyc, email;
  user = __('user_reg').value;
  email = __('email_reg').value;
  pass1 = __('pass1_reg').value;  
  pass2 = __('pass2_reg').value;
  tyc = __('tyc_reg').checked ? true : false;
  if(tyc == true){
    if(user != '' && pass1 != '' && pass2 != '' && email != '' ){
      if(pass1 == pass2){
        form = 'user=' + user + '&pass=' + pass2 + '&email=' + email;
        connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        connect.onreadystatechange = function() {
        if(connect.readyState == 4 && connect.status == 200){
          if(connect.responseText==1){
            result ='<div class="warning-success">';
            result +='<div class="div-icon-warning">';
            result +='<span class="icon-exclamation"></span>';
            result +='</div>';
            result +='<div class="div-texto-warning">';
            result +='<p class="p-texto-warning">Registro completado, redireccionando...</p>';
            result +='</div>';    
            result +='</div>';
            __('_AJAX_REG_').innerHTML = result;
            //registro = true; 
            location.reload();
          }else{
           __('_AJAX_REG_').innerHTML = connect.responseText;
          }
        }else if(connect.readyState != 4){
          result  ='<div class="warning-info">';
          result +='<div class="div-icon-warning">';
          result +='<span class="icon-exclamation"></span>';
          result +='</div>';
          result +='<div class="div-texto-warning">';
          result +='<p class="p-texto-warning">Procesando registro...</p>';
          result +='</div>';
          result +='</div>';
          __('_AJAX_REG_').innerHTML = result;
        }

      }
      connect.open('POST', 'ajax.php?mode=reg', true);
      connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      connect.send(form);

      }else{
        result ='<div class="warning-fail">';
        result +='<div class="div-icon-warning">';
        result +='<span class="icon-exclamation"></span>'
        result +='</div>'
        result +='<div class="div-texto-warning">'
        result +='<p class="p-texto-warning">Las contraseñas no coinciden.</p>'
        result +='</div>'    
        result +='</div>'
        __('_AJAX_REG_').innerHTML = result;
      }

    }else{
      result ='<div class="warning-fail">';
      result +='<div class="div-icon-warning">';
      result +='<span class="icon-exclamation"></span>'
      result +='</div>'
      result +='<div class="div-texto-warning">'
      result +='<p class="p-texto-warning">Todos los campos deben estar llenos.</p>'
      result +='</div>'    
      result +='</div>'
      __('_AJAX_REG_').innerHTML = result;
    }
  }else{
    result ='<div class="warning-fail">';
    result +='<div class="div-icon-warning">';
    result +='<span class="icon-exclamation"></span>'
    result +='</div>'
    result +='<div class="div-texto-warning">'
    result +='<p class="p-texto-warning">Terminos y condiciones deben ser aceptados.</p>'
    result +='</div>'    
    result +='</div>'
    __('_AJAX_REG_').innerHTML = result;
  }
}

function runScriptReg(e) {
  if(e.keyCode == 13){
    goReg();
  }

}
