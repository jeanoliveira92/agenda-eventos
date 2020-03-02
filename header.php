<?php 
	// Verificador de sessão 
	include("session.php"); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<link rel="icon" type="image/png-icon" href="media/images/favicon.png" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<title></title>
		<script type="text/javascript" src="js/script.js"></script>
	</head>

	<body>
		<div id="topbar">
			<div id="menubar">
				<?php 
					// Imprime mensagem de boas vindas 
					echo "<ul>";		 
					echo strtoupper("<li><a href=\"logout.php\"> ".$_SESSION['nome_usuario']."</a></li>");
					echo "<li> | </li>";
					echo "<li><a href=\"logout.php\">SAIR</a></li>";
					echo "</ul>"; 
				?>
			</div>
		</div>