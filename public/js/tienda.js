// click en icono de preguntas
function PreguntasPro(btn_pre){
	var ruta = "preguntas/"+btn_pre.value+"/edit";
	// var ruta = "QR/"+btn_QR.value+"";
	$("#res_pregunta").empty();
	$("#reload").fadeIn(100 ,'linear');
	  $.get(ruta, function(res){
	  	// console.log(res)
	    $.each(res, function(index, val) {
	    	$("#res_pregunta").append(
	    		"<form id='form_res_"+val.id+"'>"+
	    		"<table class='table table-striped table-responsive'>"+
	    		"<thead><tr><td></td><td></td></tr></thead>"+
	    		"<tbody id='data_res'>"+
	    		"<tr>"+
	    		"<td class='text-uppercase label-danger' colspan='2' style='color: #fff;'>"+
	    			"<i class='fa fa-user-circle-o'></i>"+" "+val.user.name+" "+val.user.ape+"<span class='pull-right'><small>"+val.created_at+"</small></span>"+
	    		"</td>"+
	    		"</tr>"+
	    		"<tr>"+
	    		"<td colspan='2'>"+val.pregunta+"</td>"+
	    		"</tr>"+
	    		"<tr>"+
	    		"<td colspan='2'>"+"<textarea class='form-control text_res' placeholder='Indique su respuesta...'></textarea>"+"</td>"+
	    		"</tr>"+
	    		"<tr>"+
	    		"<td colspan='2' class='text-right'>"+
	    			"<button type='button' onclick='RespuestaPro(this);' id='btn_res' class='btn btn-primary' value="+val.id+">"+"responder"+"</button>"+
	    		"</td>"+
	    		"</tr>"+
	    		"</tbody>"+
	    		"</table>"+
	    		"<div style='border-bottom: solid 1px #8133B7;'></div>"+
	    		"</form>"
	    	);

			$("#reload").fadeOut(100 ,'linear');
	    		
	    });
	  });
}

// click al boton btn_res
function RespuestaPro(btn_res){
	console.log(btn_res.value)
	var ruta = "preguntas/"+btn_res.value;
	var token = $("#token").val();
	var respuesta = $(".text_res").val();
	$("#btn_res").text('Espere...');

	$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'PUT',
		dataType: 'JSON',
		data: {respuesta: respuesta},
	})
	.done(function(data) {
		$("#msj_res").fadeIn('slow/400/fast').fadeOut(5000);
		// $("#form_res_"+btn_res.value+"").hide(2000);
		$("#form_res_"+btn_res.value+"").remove();
		$("#btn_res").text('responder');	
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
}

// $('#form_res').on("submit", function(e) {
//   e.preventDefault();
//   console.log(btn_res.value)
//   var form = $(this);
//   var ruta = "preguntas/"+btn_res.value;
//   var token = $("#token").val();
//   var respuesta = $(".text_res").val();
//   var btn = $('#btn_res');
//   btn.text('Espere...');
  
//   $.ajax({
//     url: ruta,
//     headers: {'X-CSRF-TOKEN': token},
//     type: 'PUT',
//     dataType: 'JSON',
//     data: form.serialize(),
//   })
//   .done(function(data) {
//   	console.log("done")
//   })
//   .fail(function(msj) {
//   	console.log("")
//   })
// });