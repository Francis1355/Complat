$( document ).ready(function() {
    //Login 
	$("#btn_login").click(function(){
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

});
	