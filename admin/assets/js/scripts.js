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
	//deletar registro
	//========================================
	$('.js-delete-item').click(function(e){
		e.preventDefault();
		if(window.confirm('Deseja realmente deletar o registro?')){
			window.location.href = $(this).attr('href');
		}
	});
	
	$('.js-change-visibility').click(function(e){
		e.preventDefault();
		var $el = $(this);
		var postData = 'classe='+ $el.data('classe') + '&method=changeStatus&id='+$el.data('id');
		
		common.ajax(postData, function(e){
			if(!parseInt(e)){
				l('false')
				$el.css('opacity','0.5');
			}else{
				l('true')
				$el.css('opacity','1');
			}
		});
	});
	
});

