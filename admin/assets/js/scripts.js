$(function() {
	// Side Bar Toggle
	$('.hide-sidebar').click(function() {
		$('#sidebar').hide('fast', function() {
			$('#content').removeClass('span9');
			$('#content').addClass('span12');
			$('.hide-sidebar').hide();
			$('.show-sidebar').show();
		});
	});

	$('.show-sidebar').click(function() {
		$('#content').removeClass('span12');
		$('#content').addClass('span9');
		$('.show-sidebar').hide();
		$('.hide-sidebar').show();
		$('#sidebar').show('fast');
	});
	
	//========================================
	//submenu lateral - inicio
	//========================================
	
	$('.submenu').click(function(e) {
		e.stopPropagation();
	});

	$(".btn-group1").click(function() {
		if ($(this).hasClass('open')) {
			$(".submenu", this).slideUp();
		} else {
			$(".submenu", this).slideDown();
		}
	});

	$(".submenu").slideUp();
	
	//========================================
	//submenu lateral - fim
	//========================================
	
	
	//========================================
	//deletar registro
	//========================================
	$('.btn-danger').click(function(e){
		e.preventDefault();
		if(window.confirm('Deseja realmente deletar o registro?')){
			window.location.href = $(this).attr('href');
		}
	});
	
});

