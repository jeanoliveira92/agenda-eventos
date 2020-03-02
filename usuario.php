
<?php
	// CABEÇALHO
	include("header.php");
	
	include("mysqlconfig.inc");
	
	if(isset($_GET['id'])){			
		$id = $_GET['id'];

		$sql = "select id from cliente";
		$query = mysql_query($sql) or die(mysql_error());

		while($ID = mysql_fetch_array($query)){
			$temp = md5(trim($ID['id']));
			
			if($id == $temp){				
				$id = $ID["id"];
				break;
			}
		}
		
		// SETANDO CLIENT NO FORMULARIO
		
		$sql ="select * from cliente where id='$id'";		
		$query = mysql_query($sql) or die("Deu erro".mysql_error());

		$dados = mysql_fetch_array($query);	
	}
?>

<div id="mini">
	<form id="cadastrousuer" name="cadastrousuer" <?php 
	
			if(isset($id))	{ echo "action='cadastrarusuer.php?opt=update&id=$_GET[id]';";	}
			else			{ echo "action='cadastraruser.php';";}; 
		
		?> method="post" onsubmit="return validauser(this)">
		
		<fieldset>
			<legend> <?php if(isset($_GET['id'])){echo "&nbsp;".strtoupper($dados['nome'])."&nbsp;";}  ?> </legend>	
						
			<div style="margin: 0 auto; margin:30px 30px 0px 0px; width:50%; position:relative;">
					<table>
						<?php
							if(isset($id)){
							
								// converte a data para o formato correto
								$dtransf = explode ("-", $dados['data']);
								$data = "$dtransf[2]/$dtransf[1]/$dtransf[0]";
							
								echo "<tr><td><label>Nome *</label></td></tr><tr><td><input value='$dados[nome]' type='text' name='nome' tabindex='2'/></td></tr>";
								echo "<tr><td><label>Login *</label></td></tr><tr><td><input value='$dados[tipodeevento]' type='text' name='eventotipo' tabindex='3'></td></tr>";
								echo "<tr><td><label>Senha *</label></td></tr><tr><td><input value='$dados[nomedoevento]' type='text' name='eventonome' tabindex='4'></td></tr>";								
								echo "<tr><td><label>Repita a senha *</label></td></tr><tr><td><input value='$datadoevento' type='text' name='eventodata' onkeypress=\"formatar('##/##/####', this)\" maxlength='10' tabindex='5'></td></tr>";
								
							}
							else{
								echo "<tr><td><label>Nome *</label></td></tr><tr><td><input type='text' name='nome' tabindex='2'/></td></tr>";
								echo "<tr><td><label>Login *</label></td></tr><tr><td><input type='text' name='eventotipo' tabindex='3'></td></tr>";
								echo "<tr><td><label>Senha *</label></td></tr><tr><td><input type='text' name='eventonome' tabindex='4'></td></tr>";
								echo "<tr><td><label>Repita a Senha *</label></td></tr><tr><td><input type='text' name='eventonome' tabindex='4'></td></tr>";
							}
						?>	
					</table>
			</div>
				
			<div style="width: 100%; padding: 45px 0px 35px 0px; text-align: center; float:left">		
					<input id="selector" type="button" value="CANCELAR" onclick="javascript: location.href='agenda.php'">	
					<input id="selector" type="submit" name="salvar" value="SALVAR">
			</div>
				
			</div>
		</fieldset>
	</form>
</div>

<!-- Rodapé -->
<?php 
	include("footer.php"); 
?>