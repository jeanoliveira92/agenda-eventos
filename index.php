<?php
	// Inicia a sessão 
	session_start(); 

	// Verifica se existe dados de login na sessão  
	if(isset($_SESSION["id_usuario"])){
		header("Location: main.php"); 
	
	// Verifica se existe dados de login no cookie 
	}else if(isset($_COOKIE["login"])){ 
		header("Location: login.php"); 
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<link rel="icon" type="image/png-icon" href="media/images/favicon.png" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<title>Login</title>
	</head>
	<body>
		<div id="mini">
			<form name="loginform" id="loginform" action="login.php" method="post">
				<div></div> <!-- Logo superior -->
				
				<p><label>Nome de usuário:</label><br />
					<input type="text" name="name" id="name" size="20">
				</p>
				<p><label>Senha:</label><br />
					<input type="password" name="senha" id="password" size="20">
				</p>
				
				<p style="padding-top: 15px;">
					<input name="remember" type="checkbox" id="remember" value="forever">
					<label >Lembrar</label>
					<input type="submit" name="submit" id="submit" value="Acessar">
				</p>
			</form>
		</div>

<?php include("footer.php"); ?>