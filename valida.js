function ValidaIndex(){
	// verificando se o campo E-MAIL foi preenchido
	if(Trim(document.forms['form'].elements['email'].value) == ""){
		alert("Preencha corretamente o campo E-MAIL");
		document.forms['form'].elements['email'].focus();
		return false;
	}
	// verificando se o campo SENHA foi preenchido
	else if(Trim(document.forms['form'].elements['senha'].value) == ""){
		alert("Preencha corretamente o campo SENHA");
		document.forms['form'].elements['senha'].focus();
		return false;
	}
	else{
		return true;
	}
}

function ValidaConf(){
	// verifica se é extensão JPG
	if(document.forms['form'].elements['logo'].value.lastIndexOf(".jpg") == -1 &&
	(document.forms['form'].elements['logo'].value.lastIndexOf(".jpeg") == -1)){
		alert("Extensão de arquivo para LOGO incorreta!");
		document.forms['form'].elements['nDiretor'].focus();
		return false;
	}
	else if(document.forms['form'].elements['timbre'].value.lastIndexOf(".jpg") == -1 &&
	(document.forms['form'].elements['timbre'].value.lastIndexOf(".jpeg") == -1)){
		alert("Extensão de arquivo para TIMBRE incorreta!");
		document.forms['form'].elements['nDiretor'].focus();
		return false;
	}
	else if(document.forms['form'].elements['assinatura'].value.lastIndexOf(".jpg") == -1 &&
	(document.forms['form'].elements['assinatura'].value.lastIndexOf(".jpeg") == -1)){
		alert("Extensão de arquivo para ASSINATURA incorreta!");
		document.forms['form'].elements['nDiretor'].focus();
		return false;
	}
	// verificando se o campo NOME do DIRETOR foi preenchido
	else if(Trim(document.forms['form'].elements['nDiretor'].value) == ""){
		alert("Preencha corretamente o campo NOME do DIRETOR");
		document.forms['form'].elements['nDiretor'].focus();
		return false;
	}
	// verificando se o campo E-MAIL do DIRETOR foi preenchido
	else if(Trim(document.forms['form'].elements['eDiretor'].value) == ""){
		alert("Preencha corretamente o campo E-MAIL do DIRETOR");
		document.forms['form'].elements['eDiretor'].focus();
		return false;
	}
	// verificando se o campo SENHA do DIRETOR foi preenchido
	else if(Trim(document.forms['form'].elements['sDiretor'].value) == ""){
		alert("Preencha corretamente o campo SENHA do DIRETOR");
		document.forms['form'].elements['sDiretor'].focus();
		return false;
	}
	// verificando se o campo NOME do COORDENADOR foi preenchido
	else if(Trim(document.forms['form'].elements['nCoordenador'].value) == ""){
		alert("Preencha corretamente o campo NOME do COORDENADOR");
		document.forms['form'].elements['nCoordenador'].focus();
		return false;
	}
	// verificando se o campo E-MAIL do COORDENADOR foi preenchido
	else if(Trim(document.forms['form'].elements['eCoordenador'].value) == ""){
		alert("Preencha corretamente o campo E-MAIL do COORDENADOR");
		document.forms['form'].elements['eCoordenador'].focus();
		return false;
	}
	// verificando se o campo SENHA do COORDENADOR foi preenchido
	else if(Trim(document.forms['form'].elements['sCoordenador'].value) == ""){
		alert("Preencha corretamente o campo SENHA do COORDENADOR");
		document.forms['form'].elements['sCoordenador'].focus();
		return false;
	}
	// verificando se o campo NOME do TRANSPORTE foi preenchido
	else if(Trim(document.forms['form'].elements['nTransporte'].value) == ""){
		alert("Preencha corretamente o campo NOME do TRANSPORTE");
		document.forms['form'].elements['nTransporte'].focus();
		return false;
	}
	// verificando se o campo E-MAIL do TRANSPORTE foi preenchido
	else if(Trim(document.forms['form'].elements['eTransporte'].value) == ""){
		alert("Preencha corretamente o campo E-MAIL do TRANSPORTE");
		document.forms['form'].elements['eTransporte'].focus();
		return false;
	}
	// verificando se o campo SENHA do TRANSPORTE foi preenchido
	else if(Trim(document.forms['form'].elements['sTransporte'].value) == ""){
		alert("Preencha corretamente o campo SENHA do TRANSPORTE");
		document.forms['form'].elements['sTransporte'].focus();
		return false;
	}
	// verificando se o campo NOME do ANIMAL foi preenchido
	else if(Trim(document.forms['form'].elements['nAnimal'].value) == ""){
		alert("Preencha corretamente o campo NOME do ANIMAL");
		document.forms['form'].elements['nAnimal'].focus();
		return false;
	}
	// verificando se o campo E-MAIL do ANIMAL foi preenchido
	else if(Trim(document.forms['form'].elements['eAnimal'].value) == ""){
		alert("Preencha corretamente o campo E-MAIL do ANIMAL");
		document.forms['form'].elements['eAnimal'].focus();
		return false;
	}
	// verificando se o campo SENHA do ANIMAL foi preenchido
	else if(Trim(document.forms['form'].elements['sAnimal'].value) == ""){
		alert("Preencha corretamente o campo SENHA do ANIMAL");
		document.forms['form'].elements['sAnimal'].focus();
		return false;
	}
	// verificando se o campo NOME do VEGETAL foi preenchido
	else if(Trim(document.forms['form'].elements['nVegetal'].value) == ""){
		alert("Preencha corretamente o campo NOME do VEGETAL");
		document.forms['form'].elements['nVegetal'].focus();
		return false;
	}
	// verificando se o campo E-MAIL do VEGETAL foi preenchido
	else if(Trim(document.forms['form'].elements['eVegetal'].value) == ""){
		alert("Preencha corretamente o campo E-MAIL do VEGETAL");
		document.forms['form'].elements['eVegetal'].focus();
		return false;
	}
	// verificando se o campo SENHA do VEGETAL foi preenchido
	else if(Trim(document.forms['form'].elements['sVegetal'].value) == ""){
		alert("Preencha corretamente o campo SENHA do VEGETAL");
		document.forms['form'].elements['sVegetal'].focus();
		return false;
	}
	// verificando se o campo NOME do MECANIZAÇÃO foi preenchido
	else if(Trim(document.forms['form'].elements['nMecanizacao'].value) == ""){
		alert("Preencha corretamente o campo NOME do MECANIZAÇÃO");
		document.forms['form'].elements['nMecanizacao'].focus();
		return false;
	}
	// verificando se o campo E-MAIL do MECANIZAÇÃO foi preenchido
	else if(Trim(document.forms['form'].elements['eMecanizacao'].value) == ""){
		alert("Preencha corretamente o campo E-MAIL do MECANIZAÇÃO");
		document.forms['form'].elements['eMecanizacao'].focus();
		return false;
	}
	// verificando se o campo SENHA do MECANIZAÇÃO foi preenchido
	else if(Trim(document.forms['form'].elements['sMecanizacao'].value) == ""){
		alert("Preencha corretamente o campo SENHA do MECANIZAÇÃO");
		document.forms['form'].elements['sMecanizacao'].focus();
		return false;
	}
	else{
		alert("Dados cadastrados com sucesso!");
		return true;
	}
}

function ValidaNovaSolic(){
	// verificando se o campo DATA foi escolhido
	if(Trim(document.forms['form'].elements['data'].value) == ""){
		alert("Escolha corretamente o campo DATA");
		document.forms['form'].elements['data'].focus();
		return false;
	}
	// verificando se o campo HORÁRIO DE SAÍDA foi preenchido
	else if(Trim(document.forms['form'].elements['horarioSaida'].value) == ""){
		alert("Preencha corretamente o campo HORÁRIO DE SAÍDA");
		document.forms['form'].elements['horarioSaida'].focus();
		return false;
	}
	// verificando se o campo HORÁRIO DE RETORNO foi preenchido
	else if(Trim(document.forms['form'].elements['horarioRetorno'].value) == ""){
		alert("Preencha corretamente o campo HORÁRIO DE RETORNO");
		document.forms['form'].elements['horarioRetorno'].focus();
		return false;
	}
	// verificando se o campo NOME DO PROFESSOR foi preenchido
	else if(Trim(document.forms['form'].elements['nomeProf'].value) == ""){
		alert("Preencha corretamente o campo NOME DO PROFESSOR");
		document.forms['form'].elements['nomeProf'].focus();
		return false;
	}
	// verificando se o campo TURMA foi preenchido
	else if(Trim(document.forms['form'].elements['turma'].value) == ""){
		alert("Preencha corretamente o campo TURMA");
		document.forms['form'].elements['turma'].focus();
		return false;
	}
	// verificando se o campo NÚMERO DE ALUNOS foi preenchido
	else if(Trim(document.forms['form'].elements['nroAlunos'].value) == ""){
		alert("Preencha corretamente o campo NÚMERO DE ALUNOS");
		document.forms['form'].elements['nroAlunos'].focus();
		return false;
	}
	// verificando se o campo LOCAL foi escolhido
	else if(!document.forms['form'].elements['local'][0].checked 
		&& (!document.forms['form'].elements['local'][1].checked)
		&& (!document.forms['form'].elements['local'][2].checked)){
		alert("Escolha um LOCAL");
		return false;
	}
	// verificando se o campo ACOMPANHAMENTO TÉCNICO foi respondido
	else if(!document.forms['form'].elements['acomp'][0].checked 
		&& (!document.forms['form'].elements['acomp'][1].checked)){
		alert("Responda SIM ou NÃO para o ACOMPANHAMENTO TÉCNICO");
		return false;
	}
	// verificando se o campo CONDIÇÃO CLIMÁTICA foi respondido
	else if(!document.forms['form'].elements['clima'][0].checked 
		&& (!document.forms['form'].elements['clima'][1].checked)){
		alert("Responda SIM ou NÃO para a CONDIÇÃO CLIMÁTICA");
		return false;
	}
	// verificando se o campo MATERIAIS NECESSÁRIOS foi preenchido
	else if(Trim(document.forms['form'].elements['materiais'].value) == ""){
		alert("Preencha corretamente o campo MATERIAS NECESSÁRIOS");
		document.forms['form'].elements['materiais'].focus();
		return false;
	}
	else{
		alert("Nova solicitação cadastrada com sucesso!");
		return true;
	}
	
}

function ValidaCadProf(){
	// verificando se o campo NOME do PROFESSOR foi preenchido
	if(Trim(document.forms['form'].elements['nome'].value) == ""){
		alert("Preencha corretamente o campo NOME do PROFESSOR");
		document.forms['form'].elements['nome'].focus();
		return false;
	}
	// verificando se o campo E-MAIL do PROFESSOR foi preenchido
	else if(Trim(document.forms['form'].elements['email'].value) == ""){
		alert("Preencha corretamente o campo E-MAIL do PROFESSOR");
		document.forms['form'].elements['senha'].focus();
		return false;
	}
	// verificando se o campo SENHA do PROFESSOR foi preenchido
	else if(Trim(document.forms['form'].elements['senha'].value) == ""){
		alert("Preencha corretamente o campo SENHA do PROFESSOR");
		document.forms['form'].elements['senha'].focus();
		return false;
	}
	else{
		alert("Dados cadastrados com sucesso!");
		return true;
	}
}

function Trim(str){return str.replace(/^\s+|\s+$/g,"");}