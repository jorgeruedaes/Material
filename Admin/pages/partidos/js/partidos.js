
$(function() {

	var partidos = {
		inicio: function () {
			partidos.recargar();
		},
		recargar: function () {
			partidos.enviarDatos();
			partidos.ObtenerDatos();
			partidos.ModificarPartido();
			partidos.EliminarPartido();
			partidos.AbrirAgregarResultado();
		},
		EliminarPartido: function () {
			$('.delete-partido').off('click').on('click', function () {
				var partido =$(this).data('id');
				var datos = $(this).data('partido');
				swal({title: "¿Esta seguro que desea ELIMINAR el partido?",
					text: datos,
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "rgb(174, 222, 244)",
					confirmButtonText: "Ok",
					closeOnConfirm: false
				}, function (isConfirm) {
					if (isConfirm) {

						$.ajax({
							url: 'pages/partidos/peticiones/peticiones.php',
							type: 'POST',
							data: {
								bandera: "eliminar",
								perfil:  $('#perfil').val(),
								modulo:  $('#modulo').val(),
								partido: partido

							},
							success: function (resp) {

								var resp = $.parseJSON(resp);
								if (resp.salida === true && resp.mensaje === true) {
									swal({title: "",
										text: "El partido se ha Eliminado exitosamente!",
										type: "success",
										showCancelButton: false,
										confirmButtonColor: "rgb(174, 222, 244)",
										confirmButtonText: "Ok",
										closeOnConfirm: false
									}, function (isConfirm) {
										if (isConfirm) {
											window.location.reload();
										}
									});
								} else {
									swal("", "Ha ocurrido un error, intenta nuevamente.", "error");
								}
							}
						});
					}
				});


});

},
enviarDatos: function () {
	$('.guardar').off('click').on('click', function () {
		$.ajax({
			url: 'pages/partidos/peticiones/peticiones.php',
			type: 'POST',
			data: {
				bandera: "nuevo",
				perfil:  $('#perfil').val(),
				modulo:  $('#modulo').val(),
				equipoa: $('.select-equipoa option:selected').val(),
				equipob: $('.select-equipob option:selected').val(),
				fecha:   $('#fecha').val(),
				hora:    $('#hora').val(),
				lugar:   $('.select-lugar option:selected').val(),
				ronda:   $('#ronda').val()


			},
			success: function (resp) {

				var resp = $.parseJSON(resp);
				if (resp.salida === true && resp.mensaje === true) {
					swal({title: "",
						text: "El partido se ha creado exitosamente!",
						type: "success",
						showCancelButton: true,
						confirmButtonColor: "rgb(174, 222, 244)",
						confirmButtonText: "Ok",
						closeOnConfirm: false
					}, function (isConfirm) {
						if (isConfirm) {
							window.location.reload();
						}
					});
				} else {
					swal("", "Ha ocurrido un error, intenta nuevamente.", "error");
				}
			}
		});
	});

},
ObtenerDatos: function () {
	$('.edit-partido').off('click').on('click', function () {
		var partido = $(this).data('partido');
		$.ajax({
			url: 'pages/partidos/peticiones/peticiones.php',
			type: 'POST',
			data: {
				bandera: "get_datos",
				perfil:  $('#perfil').val(),
				modulo:  $('#modulo').val(),
				id_partido: $(this).data('id')


			},
			success: function (resp) {

				var resp = $.parseJSON(resp);
				if (resp.salida === true && resp.mensaje === true) {
					$('#defaultModalLabel').text(partido);
					$('#fecha').val(resp.datos.fecha);
					$('#hora').val(resp.datos.hora);
					$('.select-lugar').val(resp.datos.lugar);
					$('.select-lugar').change();
					$('#partido').val(resp.datos.id_partido);
					$('.select-estado').val(resp.datos.estado);
					$('.select-estado').change();
					$('#ronda').val(resp.datos.Nfecha);
					$('#defaultModal').modal('show'); 
				} else {
					swal("", "Ha ocurrido un error, intenta nuevamente.", "error");
				}
			}
		});
	});

},
ModificarPartido: function () {
	$('.modificar').off('click').on('click', function () {
		swal({title: "",
			text: " ¿ Esta seguro que desea modificar el partido ?",
			type: "warning",
			showCancelButton: false,
			confirmButtonColor: "rgb(174, 222, 244)",
			confirmButtonText: "Ok",
			closeOnConfirm: false
		}, function (isConfirm) {
			if (isConfirm) {

				$.ajax({
					url: 'pages/partidos/peticiones/peticiones.php',
					type: 'POST',
					data: {
						bandera: "modificar",
						perfil:  $('#perfil').val(),
						modulo:  $('#modulo').val(),
						fecha:   $('#fecha').val(),
						hora:    $('#hora').val(),
						partido: $('#partido').val(),
						estado:  $('.select-estado option:selected').val(),
						lugar:   $('.select-lugar option:selected').val(),
						ronda:   $('#ronda').val()
					},
					success: function (resp) {

						var resp = $.parseJSON(resp);
						if (resp.salida === true && resp.mensaje === true) {
							swal({title: "",
								text: "El partido se ha mdificado exitosamente!",
								type: "success",
								showCancelButton: false,
								confirmButtonColor: "rgb(174, 222, 244)",
								confirmButtonText: "Ok",
								closeOnConfirm: false
							}, function (isConfirm) {
								if (isConfirm) {
									window.location.reload();
								}
							});
						} else {
							swal("", "Ha ocurrido un error, intenta nuevamente.", "error");
						}
					}
				});

}
});
});

},
AbrirAgregarResultado: function () {
	$('.to-partido').off('click').on('click', function () {
		var partido = $(this).data('id');
		var	url = "pages/partidos/agregarresultado.php?id="+partido; 
		window.open(url, '_self');

	});
}
};
$(document).ready(function () {

	partidos.inicio();

});

});