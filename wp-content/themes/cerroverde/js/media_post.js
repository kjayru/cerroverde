(function($){

	$(document).on('click','.yearclick',function(e){
	 	e.preventDefault();
	 	link = $(this);
	 	id   = '';
		
		$.ajax({
			url : media_vars.ajaxurl,
			type: 'post',
			data: {
				action : 'media_ajax',
				id_post: id
			},
			beforeSend: function(){
				link.html('Cargando ...');
			},
			success: function(response){
				 $(".resultados").html(response);	
				
			}

		});
	

	});

})(jQuery);