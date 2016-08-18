function goLostPass() {
  var connect, form, response, result, email;

  email = __('user_lostpass').value;
  form = 'email=' + email;

  if(email != ''){
    connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    connect.onreadystatechange = function() {
      if(connect.readyState == 4 && connect.status == 200){
          if(connect.responseText==1){
              result ='<div class="warning-success">';
              result +='<div class="div-icon-warning">';
              result +='<span class="icon-exclamation"></span>';
              result +='</div>';
              result +='<div class="div-texto-warning">';
              result +='<p class="p-texto-warning">Correo enviado correctamente.</p>';
              result +='</div>';    
              result +='</div>';
              __('_AJAX_LOSTPASS_').innerHTML = result;
              location.reload();
          }else{
              __('_AJAX_LOSTPASS_').innerHTML = connect.responseText;
          }
      }else if(connect.readyState != 4){
          result ='<div class="warning-info">';
          result +='<div class="div-icon-warning">';
          result +='<span class="icon-exclamation"></span>';
          result +='</div>';
          result +='<div class="div-texto-warning">';
          result +='<p class="p-texto-warning">Procesando información...</p>';
          result +='</div>';    
          result +='</div>';
          __('_AJAX_LOSTPASS_').innerHTML = result;
      }

    }
    connect.open('POST', 'ajax.php?mode=lostpass', true);
    connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    connect.send(form);

    }else{
        result ='<div class="warning-fail">';
        result +='<div class="div-icon-warning">';
        result +='<span class="icon-exclamation"></span>';
        result +='</div>';
        result +='<div class="div-texto-warning">';
        result +='<p class="p-texto-warning">Debe llenar el campo email.</p>';
        result +='</div>';    
        result +='</div>';
        __('_AJAX_LOSTPASS_').innerHTML = result;
    }

}


function runScriptLostPass(e) {
  if(e.keyCode == 13){
    goLostPass();
}

}
