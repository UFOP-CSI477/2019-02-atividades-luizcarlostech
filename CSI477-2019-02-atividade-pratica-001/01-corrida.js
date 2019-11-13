function adicionar(){
	var Nome = document.Competidor.Nome;
	var Partida = document.Competidor.Partida;
	var Tempo = document.Competidor.Tempo;

	var val1 = validarTexto(Nome);
	// var val2 = validarCombo(Partida);
	var val2 = true;
	var val3 = validarNumero(Tempo);
	var val4 = validarQnt();

	if(val1 && val2 && val3 && val4){
		// Partida.selectedIndex = "1";
		document.getElementById("divTable").style.display = "block";
		var Pos = achaPos(Tempo);
		inserirLinha(Nome, Partida, Tempo, Pos);
		atualizaPosERes();
		limpaDados(Nome, Partida, Tempo);

  	}

}

function achaPos(T){
	var tempo = parseFloat(T.value);
	var table = document.getElementById("Resultado");
	var pos = 1;

	for(var i = 1; i < table.rows.length; i++){
		var linha = table.rows[i];
  		var celula = linha.getElementsByTagName("td");
    	if(celula[3].innerHTML > tempo){
    		pos = i;
    		return pos;
    	}
  	}
}

function inserirLinha(Nome, Partida, Tempo, Pos) {
 	var table = document.getElementById("Resultado");
	var newRow = table.insertRow(Pos);

	var cell1 = newRow.insertCell(0);
	var cell2 = newRow.insertCell(1);
	var cell3 = newRow.insertCell(2);
	var cell4 = newRow.insertCell(3);
	var cell5 = newRow.insertCell(4);


	cell1.innerHTML = Pos;
	cell2.innerHTML = Partida.value;
	cell3.innerHTML = Nome.value;
	cell4.innerHTML = Tempo.value;
	cell5.innerHTML = '--------';
}

function atualizaPosERes(){
	var table = document.getElementById("Resultado");
	var pos = 1;
	var tempoAnt = parseFloat(table.rows[1].getElementsByTagName("td")[3].innerHTML);
	var tempoAtual;

	for(var i = 1; i < table.rows.length; i++){
		var linha = table.rows[i];
  		var celula = linha.getElementsByTagName("td");
    	tempoAtual = parseFloat(celula[3].innerHTML);
    	if(tempoAnt < tempoAtual){
    		pos++;
    	}
    	celula[0].innerHTML = pos;
    	if(celula[0].innerHTML == 1){
    		celula[4].innerHTML = "Vencedor";
				celula[4].style.backgroundColor='#006600';
    	}
    	else{
    		celula[4].innerHTML = "--------";
				celula[4].style.backgroundColor='#ffffff';
    	}
    	tempoAnt = parseFloat(celula[3].innerHTML);
  	}


  }

function limpaDados(campo, campo1, campo2){
	campo.value = "";
	campo1.value = "";
	campo2.value = "";
	campo.classList.remove("is-valid");
	campo1.classList.remove("is-valid");
	campo2.classList.remove("is-valid");
}

function validarTexto(campo){


	if(campo.value.length == 0){
	    campo.classList.add("is-invalid");
    	campo.value = "";
    	campo.focus();
    	return false;
	}
  	campo.classList.remove("is-invalid");
  	campo.classList.add("is-valid");
  	return true;
}

function validarNumero(campo){
  	var n = parseFloat(campo.value);


	if(campo.value.length == 0 || isNaN(n) || n <= 0){
	    campo.classList.add("is-invalid");
    	campo.value = "";
    	campo.focus();
    	return false;
	}
  	campo.classList.remove("is-invalid");
  	campo.classList.add("is-valid");
  	return true;
}

function validarCombo(campo){
	if (campo.selectedIndex == 0){
		campo.add("is-invalid");
		return false;
	}
  campo.remove("is-invalid");
	campo.add("is-valid");
	return true;
}

function validarQnt(alerta){
  	var tam = document.getElementById("Resultado").rows.length;
	var alerta = document.getElementById(alerta);

	if(tam >= 7){
		alerta.style.display = "block";
    	return false;
	}
	alerta.style.display = "none";
  	return true;
}
