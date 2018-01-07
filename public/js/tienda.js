// click en icono de preguntas
function PreguntasPro(btn_pre){
	var ruta = "preguntas/"+btn_pre.value+"/edit";
	// var ruta = "QR/"+btn_QR.value+"";
	$("#res_pregunta").empty();
	  $.get(ruta, function(res){
	    $.each(res, function(index, val) {
	    	$("#res_pregunta").append(
	    		"<tr>"+
	    		"<td class='text-uppercase' colspan='2'>"+"<i class='fa fa-user-circle-o'></i>"+" "+val.user.name+" "+val.user.ape+"</td>"+
	    		"</tr>"+
	    		"<tr>"+
	    		"<td colspan='2'>"+val.pregunta+"</td>"+
	    		"</tr>"+
	    		"<tr>"+
	    		"<td colspan='2'>"+"<textarea class='form-control text_res' placeholder='Indique su respuesta...'></textarea>"+"</td>"+
	    		"</tr>"+
	    		"<tr>"+
	    		"<td colspan='2' class='text-right'>"+"<button type='button' onclick='RespuestaPro(this);' id='btn_res' class='btn btn-primary' value="+val.id+">"+"responder"+"</button>"+"</td>"+
	    		"</tr>"
	    	);
	    });
	  });
}

// click al boton btn_res
function RespuestaPro(btn_res){
	console.log(btn_res.value)
	var ruta = "preguntas/"+btn_res.value;
	var token = $("#token").val();
	var respuesta = $(".text_res").val();

	$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'PUT',
		dataType: 'JSON',
		data: {respuesta: respuesta},
	})
	.done(function(data) {
		console.log(data);
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	

}