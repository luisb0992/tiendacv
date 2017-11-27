
	$(document).ready(function() {

		// manejo de calificaciones

		$( '.star-rating' ).starrating({
			clearable : true,
			initialText: "Click para calificar",
			onClick : null,
			showText : true,
		});
		$( '.star-show' ).starrating({
			clearable : false,
			initialText: "Click para calificar",
			onClick : null,
			showText : false,
		});
		
		// funcion para recargar
		function reload_pag(){
	    	location.reload();
	    }

	    // click en el boton de comentario
		$("#btn_coment").click(function(e) {
			e.preventDefault();
			var btn = $("#btn_coment");
			var icon = $(".icon_fa");
			var comentario = $("#coment").val();
			var producto_id = $("#producto_id").val();
			var puntaje = $(".puntaje").val();
			var token = $("#token").val();
			icon.addClass("fa fa-spinner fa-pulse fa-fw");
			btn.text('Espere...');

			// metodo ajax
			$.ajax({
				headers: {'X-CSRF-TOKEN': token},
				url: '../comentarios',
				type: 'POST',
				dataType: 'JSON',
				data: {descripcion: comentario, producto_id: producto_id, puntaje: puntaje},
			})
			.done(function(data) {
				// console.log(data);
				$("#comentario").modal('toggle');
			    $("#mensaje-done").fadeIn(1000,'linear');
			    $("#done_done").text("Creado! Espere unos segundos para mostrar su comentario....");
			    $("#reload").fadeIn('slow/400/fast');
			    icon.removeClass("fa fa-spinner fa-pulse fa-fw");
				btn.text('Enviar');
			    setTimeout(reload_pag, 5000);
			})
			.fail(function(error) {
				$("#modal_fail_fail").empty();
				console.log(error.responseText);

			    $("#modal-fail").fadeIn(800,'linear');
			   	$("#modal_fail_fail").append("<li>"+error.responseText+"</li>");
			    $("#modal-fail").fadeOut(4000,'linear');
			    icon.removeClass("fa fa-spinner fa-pulse fa-fw");
				btn.text('Enviar');
			})
			.always(function() {
				console.log("complete");
			});
			
		});

		// click en el boton de preguntar
		$("#btn_preguntar").click(function(e) {
			// $("#pregunta").empty();
			e.preventDefault();
			var btn = $("#btn_preguntar");
			var icon = $(".icon_fa");
			var pregunta = $("#pregunta").val();
			var producto_id = $("#producto_id").val();
			var token = $("#token").val();
			icon.addClass("fa fa-spinner fa-pulse fa-fw");
			btn.text('Espere...');

			// metodo ajax
			$.ajax({
				headers: {'X-CSRF-TOKEN': token},
				url: '../preguntas',
				type: 'POST',
				dataType: 'JSON',
				data: {pregunta: pregunta, producto_id: producto_id},
			})
			.done(function(data) {
				// console.log(data);
				$("#realizar_preguntas").modal('toggle');
			    $("#mensaje-done-pre").fadeIn(1000,'linear');
			    $("#done_done_pre").text("Su comentario fue enviado con exito! espere a que el vendedor lo lea para ser respondido");
			    $("#mensaje-done-pre").fadeOut(60000,'linear');
			    icon.removeClass("fa fa-spinner fa-pulse fa-fw");
				btn.text('Preguntar');
			    // setTimeout(reload_pag, 5000);
			})
			.fail(function(error) {
				$("#modal_fail_fail_pre").empty();
				console.log(error.responseText);

			    $("#modal-fail-pre").fadeIn(800,'linear');
			   	$("#modal_fail_fail_pre").append("<li>"+error.responseText+"</li>");
			    $("#modal-fail-pre").fadeOut(4000,'linear');
			    icon.removeClass("fa fa-spinner fa-pulse fa-fw");
				btn.text('Preguntar');
			})
			.always(function() {
				console.log("complete");
			});
			
		});
	});