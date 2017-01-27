<div class="fondo-obscuro" id="fondo_obscuro"></div>
<div class="login-box" id="login_box" onkeypress="return runScriptLogin(event)">
	<div id="_AJAX_LOGIN_"></div>
	<a href="#" class="btn-cerrar-login" id="btn_cerrar_login">X</a>
	<h3 class="titulo-login"><span class="icon-login"></span>Iniciar sesión</h3>
	<ul class="form-login">
		<li><label for="user"><span class="icon-user"></span><strong>Usuario o Email</strong></label></li>
		<li><input type="text" name="user" id="user_login" placeholder="Usuario o Email"></li>
		<li><label for="password"><span class="icon-pass"></span><strong>Contraseña</strong></label></li>
		<li><input type="password" name="pass" id="pass_login" placeholder="Contraseña"></li>
		<li>
			<label class="checkbox_label">
	   			<input type="checkbox" name="accept" value="1" class="checkbox_input" id="session_login"><span class="label-text">Recordarme</span>
	   		</label>
	   	</li>
		<li><button onclick="goLogin();">Iniciar sesión</button></li>
		<li>
			<?php 
				$fb = new Facebook\Facebook([
  					'app_id' => '110004242845198', // Replace {app-id} with your app id
  					'app_secret' => 'fc14f5c89d299ad42f4d52c863204d59',
  					'default_graph_version' => 'v2.8',
  				]);
				$helper = $fb->getRedirectLoginHelper();
				$permissions = ['email']; // Optional permissions
				$loginUrl = $helper->getLoginUrl('http://complat.net/callback.php', $permissions);
				echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
			?>
		</li>
	</ul>
	<ul>
		<li>¿No estas registrado? <a href="#" id="btn_ir_registro">¡Registrate!</a>
		<li>Contraseña <a href="#" id="btn_ir_lostpass">¿Perdida?</a></li>
	</ul>
</div>
<script src="views/js/login.js"></script>