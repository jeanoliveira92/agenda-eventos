function formatar(mascara, documento) {
	var i = documento.value.length;
	var saida = mascara.substring(0, 1);
	var texto = mascara.substring(i)

	if (texto.substring(0, 1) != saida) {
		documento.value += texto.substring(0, 1);
	}
};

function validadata(datain) {

	//hoje = new Date();
	//anoAtual= hoje.getFullYear();
	barras = datain.value.split("/");
	if (barras.length == 3) {
		dia = barras[0];
		mes = barras[1];
		ano = barras[2];

		//resultado =(!isNaN(dia) && (dia > 0) && (dia < 32)) && (!isNaN(mes) && (mes > 0) && (mes < 13)) && (!isNaN(ano) && (ano.length == 4) && (ano <= anoAtual && ano >= 1900));
		resultado = (!isNaN(dia) && (dia > 0) && (dia < 32)) && (!isNaN(mes) && (mes > 0) && (mes < 13)) && (!isNaN(ano) && (ano.length == 4) && ano >= 1900);

		if (!resultado) {
			return false;
		} else {
			return true;
		}

	} else {
		return false;
	}
};

function validacadastro(form) {

	if (!validadata(form.data)) {
		alert("Data inv�lida");
		return false;
	}
	if (form.nome.value == "") {
		alert("Nome n�o foi preenchido");
		return false;
	}
	if (form.eventotipo.value == "") {
		alert("Tipo do evento n�o foi preenchido");
		return false;
	}
	if (form.eventonome.value == "") {
		alert("Nome do evento n�o foi preenchido");
		return false;
	}
	if (!validadata(form.eventodata)) {
		alert("Data do evento inv�lida");
		return false;
	}
	if (form.local.value == "") {
		alert("Local do evento n�o foi preenchido");
		return false;
	}
	if (form.horas.value.lenght < 4) {
		alert("Horas do evento inv�lida");
		return false;
	}
	if (form.tel1.value.length < 12) {
		alert("Telefone inv�lido");
		return false;
	}
	if ((form.email.value.length <= 0) || (form.email.value.indexOf("@") < 1) || (form.email.value.indexOf('.') < 7)) {
		alert("Email inv�lido");
		return false;
	}
	if (form.classificacao.value == "") {
		alert("Classifica��o n�o foi preenchida");
		return false;
	}
	if (form.entrada.value == "") {
		alert("Entrada n�o foi preenchida");
		return false;
	}
	if (form.notas.value == "") {
		if (!confirm("Campo Nota vazio, deseja prosseguir?")) {
			return false;
		} else {
			return true;
		}
	}
	return true;
};

function setStatus(status) {

	if (status == "Finalizado") {
		document.cadastroform.data.disabled = "true";
		document.cadastroform.nome.disabled = "true";
		document.cadastroform.eventotipo.disabled = "true";
		document.cadastroform.eventonome.disabled = "true";
		document.cadastroform.eventodata.disabled = "true";
		document.cadastroform.local.disabled = "true";
		document.cadastroform.horas.disabled = "true";
		document.cadastroform.tel1.disabled = "true";
		document.cadastroform.tel2.disabled = "true";
		document.cadastroform.tel3.disabled = "true";
		document.cadastroform.email.disabled = "true";
		document.cadastroform.face.disabled = "true";
		document.cadastroform.outros.disabled = "true";
		document.cadastroform.classificacao.disabled = "true";
		document.cadastroform.entrada.disabled = "true";
		document.cadastroform.salvar.disabled = "true";

	} else if (status == "Aberto") {
		document.cadastroform.data.removeAttribute('disabled');
		document.cadastroform.nome.removeAttribute('disabled');
		document.cadastroform.eventotipo.removeAttribute('disabled');
		document.cadastroform.eventonome.removeAttribute('disabled');
		document.cadastroform.eventodata.removeAttribute('disabled');
		document.cadastroform.local.removeAttribute('disabled');
		document.cadastroform.horas.removeAttribute('disabled');
		document.cadastroform.tel1.removeAttribute('disabled');
		document.cadastroform.tel2.removeAttribute('disabled');
		document.cadastroform.tel3.removeAttribute('disabled');
		document.cadastroform.email.removeAttribute('disabled');
		document.cadastroform.face.removeAttribute('disabled');
		document.cadastroform.outros.removeAttribute('disabled');
		document.cadastroform.classificacao.removeAttribute('disabled');
		document.cadastroform.entrada.removeAttribute('disabled');
		document.cadastroform.salvar.removeAttribute('disabled');
	}
};
