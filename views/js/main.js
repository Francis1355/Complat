$( document ).ready(function() {
    //Login 
	$("#btn_login").click(function(){
		$("#fondo_obscuro").fadeIn(400);
		$("#login_box").slideDown(300);
	});

	$("#btn_login_get").click(function(){
		$("#fondo_obscuro").fadeIn(400);
		$("#login_box").slideDown(300);
	});

	$("#btn_login_movil").click(function(){
		$("#fondo_obscuro").fadeIn(400);
		$("#login_box").slideDown(300);
	});

	$("#btn_cerrar_login").click(function(){
		$("#fondo_obscuro").fadeOut(300);
		$("#login_box").fadeOut(500);
	});

	//Registro

	$("#btn_registro").click(function(){
		$("#fondo_obscuro").fadeIn(200);
		$("#registro_box").slideDown(300);
	});

	$("#btn_registro_movil").click(function(){
		$("#fondo_obscuro").fadeIn(200);
		$("#registro_box").slideDown(300);
	});

	$("#btn_cerrar_registro").click(function(){
		$("#fondo_obscuro").fadeOut(300);
		$("#registro_box").fadeOut(500);
	});

	$("#btn_ir_registro").click(function(){
		$("#login_box").fadeOut(100);
		$("#registro_box").fadeIn(500);
	});

	//Loguearte para activacion 

	$("#btn_logearte").click(function(){
		$("#fondo_obscuro").fadeIn(400);
		$("#login_box").slideDown(300);
	});


	//Lostpass

	$("#btn_ir_lostpass").click(function(){
		$("#login_box").fadeOut(100);
		$("#lostpass_box").fadeIn(500);
	});


	$("#btn_cerrar_lostpass").click(function(){
		$("#fondo_obscuro").fadeOut(300);
		$("#lostpass_box").fadeOut(500);
	});


	/*$("#btn_unsuscribe_cancel").click(function(){
    	$('body, html').animate({
            scrollTop: '0px'
    }, 0);*/

});





//Inicia buscador 

function search(){
	var input_search, form, connect, responseText, result, flagSearch;
	input_search = __('input_search').value;
	if(input_search == ""){
		flagSearch = false;
	}else{
		flagSearch = true;
	}
	if(flagSearch){
		//Ocultar div id courses 
		$('#courses').hide();
		//Mostar div ajax
		$('#_SEARCH_AJAX_').show(); 
	}else{
		//Ocultar div ajax
		$('#_SEARCH_AJAX_').hide(); 
		//Mostrar div ajax 
		$('#courses').show();
	}
	form = 'keyword=' + input_search;
	connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	connect.onreadystatechange = function() {
    if(connect.readyState == 4 && connect.status == 200){
        if(connect.responseText){        	
          __('_SEARCH_AJAX_').innerHTML = connect.responseText;
        }
    }else if(connect.readyState != 4){
	    result = "<center><img src='views/img/spin.gif' alt='Cargando...''></center>";
	    __('_SEARCH_AJAX_').innerHTML = result;
    }

  }
  connect.open('POST', 'ajax.php?mode=search', true);
  connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  connect.send(form);
}

//Termina buscador
	