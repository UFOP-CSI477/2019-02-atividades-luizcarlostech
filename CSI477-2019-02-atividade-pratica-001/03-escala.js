function calcular() {

	var Amplitude = parseFloat(document.Escala.Amplitude.value);
	var Delta = parseFloat(document.Escala.Delta.value);

	var val1 = validarNumero(document.Escala.Amplitude);
	var val2 = validarNumero(document.Escala.Delta);

	if(val1 && val2){
		var Escala = ( (Math.log10(Amplitude)) + (3*Math.log10(8*Delta)) - 2.92).toFixed(2);


		document.Resposta.EscalaResp.value = "Escala Richter: " +Escala;
		document.Resposta.EscalaDadosAmplitude.value = "Amplitude: " +Amplitude;
		document.Resposta.EscalaDadosDelta.value = "Delta: " +Delta;

		document.getElementById("divResultado").style.display = "block";
		document.getElementById("divTableEscala").style.display = "block";
		destacar(IndexEscala(Escala));
		limpaDados(document.Escala.Amplitude);
		limpaDados(document.Escala.Delta);
  	}

}

function IndexEscala(Escala){
	if(Escala < 3.5)
		return 1;
	else if (Escala <= 5.4)
		return 2;
	else if (Escala <= 6)
		return 3;
	else if (Escala <= 6.9)
		return 4;
	else if (Escala <= 7.9)
		return 5;
	else
		return 6;
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

function limpaDados(campo){
	campo.value = "";
	campo.classList.remove("is-valid");
}

function destacar(Index){
	var table = document.getElementById("TableEscala");

	for(var i = 1; i < table.rows.length; i++){

		if(i==Index){
			var linha = table.rows[i]
			if(i==1)
				linha.classList.add("bg-success");
			else if(i==2)
				linha.classList.add("bg-info");
			else if(i==3)
				linha.classList.add("bg-warning");
			else
				linha.classList.add("bg-danger");
		}
		else{
			table.rows[i].classList.remove("bg-warning");
			table.rows[i].classList.remove("bg-info");
			table.rows[i].classList.remove("bg-success");
			table.rows[i].classList.remove("bg-danger");
		}
  	}
}
