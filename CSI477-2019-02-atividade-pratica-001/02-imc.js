function calcular() {

	var Nome = document.IMC.Nome.value;
	var Peso = parseFloat(document.IMC.Peso.value);
	var Altura = parseFloat(document.IMC.Altura.value);

	var val1 = validarTexto(document.IMC.Nome);
	var val2 = validarNumero(document.IMC.Peso);
	var val3 = validarNumero(document.IMC.Altura);

	if(val1 && val2 && val3){
		var IMC = (Peso / (Altura * Altura)).toFixed(2);

		var Result = document.getElementById("ImcResp");
		var Class = classificacao(IMC);
		document.Resposta.ImcResp.value = "Olá " +Nome +
				", seu IMC é: " +IMC+", classificado como: " +Class;

		var pesoMin = pesoIdealMin(Altura);
		var pesoMax = pesoIdealMax(Altura);
		document.Resposta.IdealResp.value = "Seu peso para classificação saúdavel é entre: "
										+pesoMin.toFixed(2) +" e " +pesoMax.toFixed(2) +".";

		document.Resposta.ImcDadosPeso.value = "Peso: " +Peso;
		document.Resposta.ImcDadosAltura.value = "Altura: " +Altura;

		document.getElementById("divResultado").style.display = "block";
		document.getElementById("divTableIMC").style.display = "block";
		destacar(IndexIMC(IMC));
		limpaDados(document.IMC.Nome);
		limpaDados(document.IMC.Peso);
		limpaDados(document.IMC.Altura);
  	}

}

function classificacao(IMC){
	if(IMC < 18.5)
		return "Subnutrição";
	else if (IMC <= 24.9)
		return "Peso Saudável";
	else if (IMC <= 29.9)
		return "Sobrepeso";
	else if (IMC <= 34.9)
		return "Obesidade grau 1";
	else if (IMC <= 39.9)
		return "Obesidade grau 2";
	else
		return "Obesidade grau 3";
}

function IndexIMC(IMC){
	if(IMC < 18.5)
		return 1;
	else if (IMC <= 24.9)
		return 2;
	else if (IMC <= 29.9)
		return 3;
	else if (IMC <= 34.9)
		return 4;
	else if (IMC <= 39.9)
		return 5;
	else
		return 6;
}

function pesoIdealMin(Altura){
	return Altura*Altura*18.5;
}

function pesoIdealMax(Altura){
	return Altura*Altura*24.9;
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
	var table = document.getElementById("TableIMC");

	for(var i = 1; i < table.rows.length; i++){

		if(i==Index){
			var linha = table.rows[i]
			if (i == 1 || i == 3){
				linha.classList.add("bg-warning");
			}
			else if (i== 2){
				linha.classList.add("bg-success");
			}
			else{
				linha.classList.add("bg-danger");
			}
		}
		else{
		table.rows[i].classList.remove("bg-warning");
		table.rows[i].classList.remove("bg-success");
		table.rows[i].classList.remove("bg-danger");
		}
  	}
}
