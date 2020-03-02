<?php
	// Conexão com o banco de dados 
	include("mysqlconfig.inc");
	
	// Inicia sessões 
	session_start();
	
	$data			= $_POST['data'];
	$nome			= $_POST['nome'];
	$tel1			= $_POST['tel1'];
	$classificacao	= $_POST['classificacao'];
	$eventotipo		= $_POST['eventotipo'];
	$tel2			= $_POST['tel2'];
	$entrada		= $_POST['entrada'];
	$eventonome		= $_POST['eventonome'];
	$tel3			= $_POST['tel3'];
	$eventodata		= $_POST['eventodata'];
	$email			= $_POST['email'];
	$local			= $_POST['local'];
	$face			= $_POST['face'];
	$horas			= $_POST['horas'];
	$outros			= $_POST['outros'];
	$notas			= $_POST['notas'];
	$status			= $_POST['status'];
	
	if(isset($_GET["opt"])){
		$opt 	= $_GET["opt"];
		
		$id 	= $_GET["id"];
		$sql = "select id from cliente";
		$query = mysql_query($sql) or die(mysql_error());

		while($ID = mysql_fetch_array($query)){
			$temp = md5(trim($ID['id']));
			
			if($id == $temp){				
				$id = $ID["id"];
				break;
			}
		}
	}

	
	//variavel que informará a ocorrencia de erros
	$erro = 0;
	
	if(empty($data)){
		$erro = 1;
		$msg = "INFORME A DATA";
		
	}elseif(empty($nome)){
		$erro = 1;
		$msg = "INFORME SEU NOME";
		
	}elseif(empty($eventotipo)){
		$erro = 1;
		$msg = "INFORME O TIPO DO EVENTO";
		
	}elseif(empty($eventonome)){
		$erro = 1;
		$msg = "INFORME O NOME DO EVENTO";
		
	}elseif(empty($eventodata)){
		$erro = 1;
		$msg = "INFORME A DATA DO EVENTO";
		
	}elseif(empty($local)){
		$erro = 1;
		$msg = "INFORME O LOCAL";
		
	}elseif(empty($horas)){
		$erro = 1;
		$msg = "INFORME AS HORAS DO EVENTO";
		
	}elseif(empty($tel1)){
		$erro = 1;
		$msg = "INFORME SEU TELEFONE";
		
	}elseif(strlen($email)<7 || substr_count($email,"@")!=1 || substr_count($email,".")==0){
		//verifica tamanho mínimo do e-mail e se existe "@" e ponto.
		$erro = 1;
		$msg = "E-MAIL NÃO FOI DIGITADO CORRETAMENTE"; 
		
	}elseif(empty($classificacao)){
		$erro = 1;
		$msg = "INFORME A CLASSIFICAÇÃO";
		
	}elseif(empty($entrada)){
		$erro = 1;
		$msg = "INFORME A VIA DE ENTRADA";	
	}

	//$dtransf tranforma a $data que é dd/mm/yyyy em yyyy-mm-dd que é o formato aceito em MySQL.
	$dtransf = explode("/", $data);
	$data = "$dtransf[2]-$$dtransf[1]-$dtransf[0]";
	
	$dtransf2 = explode("/", $eventodata);
	$eventodata = "$dtransf2[2]-$$dtransf2[1]-$dtransf2[0]";
	
	
	if($erro){
		//se não há erro, exibe a msg
		echo"<script> alert('$msg'); Location: javascript:history.back(); </script>";
			
	}else{
		//aqui podemos realizar o tratamento das informações. ex: gravando em um arquivo ou banco de dados
		if(isset($_GET["opt"])){
			$sql = "update cliente set data='$data', 
										nome='$nome', 		
										tipodeevento='$eventotipo',
										nomedoevento='$eventonome',
										datadoevento='$eventodata',
										local='$local',
										horas='$horas',
										telefone1='$tel1',
										telefone2='$tel2',
										telefone3='$tel3',
										email='$email',
										facebook='$face',
										outros='$outros',
										classificacao='$classificacao',
										entrada='$entrada',
										status='$status'
										where id='$id'";
			
		}else{
			$sql = "insert into cliente values('NULL','$data','$nome','$eventotipo','$eventonome','$eventodata','$local','$horas','$tel1','$tel2','$tel3','$email','$face','$outros','$classificacao','$entrada','$status')";
		}
		
		$result_id = mysql_query($sql) or die("<script> alert('Erro no banco de dados! Em SQL cliente $id'); Location: javascript:history.back(); </script>"); 
		//$total = mysql_num_rows($result_id); 
		
		if($result_id){
			// CADASTROU
			if(!empty($notas)){
				if(isset($_GET["opt"])){
					$clientId= $id;
				}else{
					$clientId = mysql_insert_id();
				}
				
				// converte para o formato de dados do banco
				$dtransf = explode("/", gmdate("d/m/Y"));
				$clientData = "$dtransf[2]-$$dtransf[1]-$dtransf[0]";
	
				$sql = "insert into notas values('NULL','$clientId','$clientData','$notas')";
				$result_id = mysql_query($sql) or die("<script> alert('Erro no banco de dados! em notas'); Location: javascript:history.back(); </script>"); 
			}

			
			header("location: agenda.php");

		}else{ 
			//ERRO NO CADASTRO
			echo"<script> alert('Não foi possivel o cadastro'); Location: javascript:history.back(); </script>"; 
		}
	}	
?>