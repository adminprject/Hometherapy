$(document).ready(function(){
	$('.delete').click(function(e){
		e.preventDefault();
		var id = $(this).attr('data-id');

				bootbox.dialog({
					message: "¿Estás seguro de eliminar el registro?",
					title: "¡Atención!",
					buttons: {
						cancel: {
							label: "No",
							className: "btn-success",
							callback: function() {
								$('.bootbox').modal('hide');
							}
						},
						confirm: {
							label: "Eliminar",
							className: "btn-danger",
							callback: function() {
							$.ajax({
								headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
				                url    : 'admin/categories/forum/'+id,
				                type   : 'DELETE',
							})
						//Si todo ha ido bien...
						.done(function(response){
							bootbox.alert(response);
							parent.fadeOut('slow'); //Borra la fila afectada
						})
						.fail(function(){
							bootbox.alert('Algo ha ido mal. No se ha podido completar la acción.');
						})
					}
				}
			}
		});
	});
});