<?php 
	// Cabeçalho
	//include("header.php");
	
	// Conexão com o banco de dados 
	//include("mysqlconfig.inc");;
	//include("mysqlconfig.inc");;
?>

<div id="container" style=" margin-top:90px;">
	<form id="clientlistform" name="clientlistform" action="" method="get">
		<fieldset>
			<legend> <?php echo "&nbsp; CONTINUAR CONVERSA &nbsp;";  ?>
				<select name="ord" onChange="submit();">
					<option></option>
					<option value="data">Data</option>
					<option value="nome">Conversa</option>
					<option value="tipodeevento">Tipo</option>
					<option value="datadoevento">Data do Evento</option>
					<option value="status">Status</option>
				</select>	
			</legend>
				
			<div style="margin: 0 auto; width:710px; margin-top:30px; position:relative;" >	
			<?php
				// INICIO DA TABELA DE EXIBIÇÃO
				echo "<table>"; 
				echo   "<tr><th>Data</th>
							<th>Conversa</th>
							<th>Tipo</th>
							<th>Data do Evento</th>
							<th>Notas</th>
							<th>Status</th>
						</tr>"; 
			
				$inicio = 0;
				$limite = 8; // NUMERO DE CADASTROS POR PAGINA
				
				if(!isset($_GET['pag']) || is_nan($_GET['pag']) || $_GET['pag'] == 0 || $_GET['pag']== ''){
					$pag = 1;
					
				}else{
					$pag = $_GET['pag'];
					$pag = filter_var($pag, FILTER_VALIDATE_INT);
				}
				
				$busca_total = mysql_query("SELECT count(id) FROM cliente");
				$total = mysql_result($busca_total, 0); 
				
				$inicio = ($pag - 1) * $limite; 
					
				$busca = "SELECT * FROM cliente";
				
				if(isset($_GET['ord'])){
				
					$query = 'DESCRIBE cliente'; 
					$results = mysql_query($query) or die('Query error: ' . mysql_error()); 

					while($row = mysql_fetch_array($results)){
						if( $_GET['ord'] == $row[0]){
							$ord = $_GET['ord'];
							break;
						}else{
							$ord = "data";
						}
					} 
					
					$busca .= " order by $ord desc";
					
					
				}else{
					$busca .= " order by data desc";
					$ord = "data";
				}
				
				$busca .= " LIMIT $inicio, $limite";
				
				$busca = mysql_query($busca);
				if (mysql_num_rows($busca)>0){
				
					while($dados = mysql_fetch_array($busca)){
						
							$client_ID = $dados["id"];
							
							$search = mysql_query("SELECT count(id) FROM notas where client_id='$client_ID'");
							$numero_notas = mysql_result($search, 0); 		
							
							// Encrypta a senha para enviar pelo matodo get
							$id = md5(trim($dados["id"])); 
							
							echo	"<tr onclick=\"location.href='conversa.php?id=$id';\" style='cursor: pointer;'>
										<th>" . date('d/m/y', strtotime($dados['data'])) . "</th>
										<th>" . $dados["nome"] . "</th>
										<th>" . $dados["tipodeevento"] . "</th>
										<th>" . date('d/m/y', strtotime($dados['datadoevento'])) . "</th>
										<th>" . $numero_notas . "</th>
										<th>" . $dados["status"] . "</th>
									</tr>";	
					}
				
					/* PAGINAÇÃO */
					
					$prox = $pag + 1;
					$ant = $pag - 1;
					$ultima_pag = ceil($total / $limite);
					$penultima = $ultima_pag - 1;	
					$adjacentes = 2;
					
					echo "<tr><th colspan='6' style='text-align: center;' class='paginacao'>";

					if ($pag>1){
						echo  '<a href="?ord='.$ord.'&pag='.$ant.'">Anterior</a>';
					}else{
						echo  '';
					}
						
					if ($ultima_pag <= 5){
						for ($i=1; $i< $ultima_pag+1; $i++){
							if ($i == $pag){
								echo  '<a class="atual" href="?ord='.$ord.'&pag='.$i.'">'.$i.'</a>';	
								
							} else {
								echo  '<a href="?ord='.$ord.'&pag='.$i.'">'.$i.'</a>';	
							}
						}
					} 

					if ($ultima_pag > 5){
						if ($pag < 1 + (2 * $adjacentes)){
							for ($i=1; $i< 2 + (2 * $adjacentes); $i++){
								if ($i == $pag)	{
									echo  '<a class="atual" href="?ord='.$ord.'&pag='.$i.'">'.$i.'</a>';				
								} else {
									echo  '<a href="?ord='.$ord.'&pag='.$i.'">'.$i.'</a>';	
								}
							}
							
							echo  '...';
							echo  '<a href="?ord='.$ord.'&pag='.$penultima.'">'.$penultima.'</a>';
							echo  '<a href="?ord='.$ord.'&pag='.$ultima_pag.'">'.$ultima_pag.'</a>';
							
						}elseif($pag > (2 * $adjacentes) && $pag < $ultima_pag - 3)	{
						
							echo  '<a href="?ord='.$ord.'&pag=1">1</a>';				
							echo  '<a href="?ord='.$ord.'&pag=1">2</a> ... ';	
							
							for ($i = $pag-$adjacentes; $i<= $pag + $adjacentes; $i++){
							
								if ($i == $pag){
									echo  '<a class="atual" href="?ord='.$ord.'&pag='.$i.'">'.$i.'</a>';
									
								} else {
									echo  '<a href="?ord='.$ord.'&pag='.$i.'">'.$i.'</a>';	
								}
							}
							
							echo  '...';
							echo  '<a href="?ord='.$ord.'&pag='.$penultima.'">'.$penultima.'</a>';
							echo  '<a href="?ord='.$ord.'&pag='.$ultima_pag.'">'.$ultima_pag.'</a>';
						}
						else {
						
							echo  '<a href="?ord='.$ord.'&pag=1">1</a>';				
							echo  '<a href="?ord='.$ord.'&pag=1">2</a> ... ';	
							
							for ($i = $ultima_pag - (4 + (2 * $adjacentes)); $i <= $ultima_pag; $i++){
								if ($i == $pag){
									echo  '<a class="atual" href="?ord='.$ord.'&pag='.$i.'">'.$i.'</a>';	
									
								} else {
									echo  '<a href="?ord='.$ord.'&pag='.$i.'">'.$i.'</a>';	
								}
							}
						}
					}

				}
					

				if ($prox <= $ultima_pag && $ultima_pag > 2){
					echo  '<a href="?ord='.$ord.'&pag='.$prox.'">pr&oacute;xima &raquo;</a>';
				}
						
			
			?>
			</div>

			<div style="position: relative; width: 100%;padding: 45px 0px 35px 10px; text-align: center;">
				<input id="selector" type="button" value="Voltar" onclick="javascript: location.href='agenda.php'">	
			</div >
		</fieldset>
	</form>
</div>

	</body>
</html>