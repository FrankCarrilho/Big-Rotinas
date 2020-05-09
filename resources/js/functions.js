
function deleteEquipamento(url){
	$("#btnDelete").attr("href",url);
}

function deleteMaquina(url){
	$("#btnDelete").attr("href",url);
}


function getHorario(){
	turno = $("#turno").val();
	if(turno == 1){
		input = "";
		for(i=7;i<=12;i++){
			aux = i<10 ? ("00" + i).slice(-2):i;
			input +="<option value=\""+aux+"\">"+aux+"</option>";
		}
		$("#horarioInicio").html(input);
		$("#horarioFim").html(input);
	}else if(turno ==2){
		input = "";
		for(i=12;i<=18;i++){
			input +="<option value=\""+i+"\">"+i+"</option>";
		}
		$("#horarioInicio").html(input);
		$("#horarioFim").html(input);
	}else{
		input = "";
		for(i=18;i<=22;i++){
			input +="<option value=\""+i+"\">"+i+"</option>";
		}
		$("#horarioInicio").html(input);
		$("#horarioFim").html(input);
	}
}


function setHorario(inicio,fim){
	turno = $("#turno").val();
	if(turno == 1){
		inputInicio = "";
		inputFim = "";
		for(i=7;i<=12;i++){
			aux = i<10 ? ("00" + i).slice(-2):i;
			selectedInicio = aux == inicio ? "selected=\"\"" :null;
			selectedFim = aux == fim ?  "selected=\"\"" :null;
			inputInicio +="<option "+selectedInicio+" value=\""+aux+"\">"+aux+"</option>";
			inputFim +="<option "+selectedFim+" value=\""+aux+"\">"+aux+"</option>";
		}
		$("#horarioInicio").html(inputInicio);
		$("#horarioFim").html(inputFim);
	}else if(turno ==2){
		input = "";
		for(i=12;i<=18;i++){
			input +="<option value=\""+i+"\">"+i+"</option>";
		}
		$("#horarioInicio").html(input);
		$("#horarioFim").html(input);
	}else{
		input = "";
		for(i=18;i<=22;i++){
			input +="<option value=\""+i+"\">"+i+"</option>";
		}
		$("#horarioInicio").html(input);
		$("#horarioFim").html(input);
	}
}



//Lista as maquinas de um laboratorio

	function listaMaquinasLaboratorio(urlData){
		lab = $('#laboratorio').val();


		$.ajax({
         url : urlData+"/"+lab,
         type : 'post'
     }).done(function(msg){
          $("#listaLaboratorios").html(msg);
    })

	}
