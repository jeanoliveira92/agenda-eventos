
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

<div id="container">
	<form id="cadastroform" name="cadastroform" <?php 
	
			if(isset($id))	{ echo "action='cadastrarconversa.php?opt=update&id=$_GET[id]';";	}
			else			{ echo "action='cadastrarconversa.php';";}; 
		
		?> method="post" onsubmit="return validacadastro(this)">
		
		<fieldset>
			<legend> <?php if(isset($_GET['id'])){echo "&nbsp;".strtoupper($dados['nome'])."&nbsp;";}  ?> </legend>	
						
			<div style="margin: 0 auto; margin:30px 30px 0px 30px; position:relative;">
				<div style="width:50%;float: left;" >
					<table>
						<?php
							if(isset($id)){
							
								// converte a data para o formato correto
								$dtransf = explode ("-", $dados['data']);
								$data = "$dtransf[2]/$dtransf[1]/$dtransf[0]";
							
								echo "<tr><td>Data *</td><td><input value='$data' type='text' name='data' OnKeyPress=\"formatar('##/##/####', this)\" style='width: 70px;' maxlength='10' tabindex='1'></td></tr>";
								echo "<tr><td><label>Nome *</label></td><td><input value='$dados[nome]' type='text' name='nome' tabindex='2'/></td></tr>";
								echo "<tr><td><label>Tipo de Evento *</label></td><td><input value='$dados[tipodeevento]' type='text' name='eventotipo' tabindex='3'></td></tr>";
								echo "<tr><td><label>Nome do Evento *</label></td><td><input value='$dados[nomedoevento]' type='text' name='eventonome' tabindex='4'></td></tr>";								
								
								// converte a data do evento para o formato correto
								$dtransf = explode ("-", $dados['datadoevento']);
								$datadoevento = "$dtransf[2]/$dtransf[1]/$dtransf[0]";
								
								echo "<tr><td><label>Data do evento *</label></td><td><input value='$datadoevento' type='text' name='eventodata' onkeypress=\"formatar('##/##/####', this)\" maxlength='10' tabindex='5'></td></tr>";
								echo "<tr><td><label>Local *</label></td><td><input value='$dados[local]' type='text' name='local' tabindex='6'></td></tr>";
								echo "<tr><td><label>Horas *</label></td><td><input value='$dados[horas]' type='text' name='horas' onkeypress=\"formatar('##:##', this)\" maxlength='5' tabindex='7'></td></tr>";
								echo "<tr><td><label>Telefone *</label></td><td><input value='$dados[telefone1]' type='text' name='tel1' onkeypress=\"formatar('##-####-####', this)\" maxlength='13' tabindex='8'></td></tr>";
								echo "<tr><td><label>Telefone</label></td><td><input value='$dados[telefone2]' type='text' name='tel2' onkeypress=\"formatar('##-####-####', this)\" maxlength='13' tabindex='9'></td></tr>";
								echo "<tr><td><label>Telefone</label></td><td><input value='$dados[telefone3]' type='text' name='tel3' onkeypress=\"formatar('##-####-####', this)\" maxlength='13' tabindex='10'></td></tr>";
								echo "<tr><td><label>Email *</label></td><td><input value='$dados[email]' type='text' name='email' tabindex='11'></td></tr>";
								echo "<tr><td><label>Facebook:</label></td><td><input value='$dados[facebook]' type='text' name='face' tabindex='12'></td></tr>";
								echo "<tr><td><label>Outros:</label></td><td><input value='$dados[outros]' type='text' name='outros' tabindex='13'></td></tr>";
								echo "<tr><td><label>Classificação *</label></td><td><input value='$dados[classificacao]' type='text' name='classificacao' id='name' tabindex='14'></td></tr>";
								echo "<tr><td><label>Entrada via *</label></td><td><input value='$dados[entrada]' type='text' name='entrada' id='name' tabindex='15'></td></tr>";
							}
							else{
								echo "<tr><td>Data *</td><td><input type='text' name='data' onkeypress=\"formatar('##/##/####', this)\" style='width: 70px;' maxlength='10' tabindex='1'></td></tr>";
								echo "<tr><td><label>Nome *</label></td><td><input type='text' name='nome' tabindex='2'/></td></tr>";
								echo "<tr><td><label>Tipo de Evento *</label></td><td><input type='text' name='eventotipo' tabindex='3'></td></tr>";
								echo "<tr><td><label>Nome do Evento *</label></td><td><input type='text' name='eventonome' tabindex='4'></td></tr>";
								echo "<tr><td><label>Data do evento *</label></td><td><input type='text' name='eventodata' onkeypress=\"formatar('##/##/####', this)\" maxlength='10' tabindex='5'></td></tr>";
								echo "<tr><td><label>Local *</label></td><td><input type='text' name='local' tabindex='6'></td></tr>";
								echo "<tr><td><label>Horas *</label></td><td><input type='text' name='horas' onkeypress=\"formatar('##:##', this)\" maxlength='5' tabindex='7'></td></tr>";
								echo "<tr><td><label>Telefone *</label></td><td><input type='text' name='tel1' onkeypress=\"formatar('##-####-####', this)\" maxlength='13' tabindex='8'></td></tr>";
								echo "<tr><td><label>Telefone</label></td><td><input type='text' name='tel2' onkeypress=\"formatar('##-####-####', this)\" maxlength='13' tabindex='9'></td></tr>";
								echo "<tr><td><label>Telefone</label></td><td><input type='text' name='tel3' onkeypress=\"formatar('##-####-####', this)\" maxlength='13' tabindex='10'></td></tr>";
								echo "<tr><td><label>Email *</label></td><td><input type='text' name='email' tabindex='11'></td></tr>";
								echo "<tr><td><label>Facebook:</label></td><td><input type='text' name='face' tabindex='12'></td></tr>";
								echo "<tr><td><label>Outros:</label></td><td><input type='text' name='outros' tabindex='13'></td></tr>";
								echo "<tr><td><label>Classificação *</label></td><td><input type='text' name='classificacao' id='name' tabindex='14'></td></tr>";
								echo "<tr><td><label>Entrada via *</label></td><td><input type='text' name='entrada' id='name' tabindex='15'></td></tr>";
							}
						?>	
					</table>
				</div>
				
				<div style="width:50%; margin-left: 50%;">				
					<table>
						<tr><td style="text-align:center;"><label>Status:</label>
							<select name="status" onchange="setStatus('Aberto');">
								<option value="Aberto">Aberto</option>
								<option value="Finalizado">Finalizado</option>"
							</select>
						</td></tr>
					</table>
					<table>
						<tr>
							<td style="width: 45px; text-align:left;">Data</td>
							<td style="text-align:left;"> Notas </td>
						</tr>
						
						<tr><td><?php /* exibe a data */ echo (gmdate("d/m/y")); ?></td>
							<td><textarea name="notas" style="margin-bottom:15px;padding: 5px 5px 5px 5px; max-height:150px; min-height:100px; max-width:350px; min-width:350px;"></textarea></td>
						</tr>
						
						<?php
							if(isset($id)){
								// EXIBIR NOTAS
								$sql = "select * from notas where client_id='$id' order by data desc";
								$query = mysql_query($sql) or die(mysql_error()); 
								
								while($nota = mysql_fetch_array($query)){	
									
									echo "<tr>
											<td>".date('d/m/y', strtotime($nota['data']))."</th>
											<td><textarea style='padding: 5px 5px 5px 5px; max-height:150px; min-height:100px; max-width:350px; min-width:350px;' disabled>
												$nota[conteudo] </textarea>
											</td>
										 </tr>";	
								}
							}							
						?>
					</table>
				</div>
				
				<div style="width: 100%; padding: 45px 0px 35px 10px; text-align: center; float:left">		
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

	if(isset($id)){
		if($dados['status'] == "Finalizado"){
			echo "<script>setStatus(\"Finalizado\");</script>";
			echo"<script>document.cadastroform.status.value='Finalizado'</script>"; 
		}
	}
?>