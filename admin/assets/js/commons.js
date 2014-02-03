/* 
 * Funções comuns para todos os projetos
 */


(function($) {
	window.l =  function(p) {
		if (typeof(console) == 'object') {
			console.log(p);
		}
	};
	
	var common = function() {
		var fuPublic = {};

		fuPublic.handleAjaxResponse = function(r) {
			if (typeof(r) == 'string') {
				r = $.parseJSON(r);
			}
			return r;
		};

		fuPublic.log = function(p) {
			if (typeof(console) == 'object') {
				console.log(p);
			}
		};
		
		fuPublic.ajax = function(postData, done){
			$.ajax({
				type: "POST",
				url: "../../ajax.php",
				data: postData
			}).done(done);
		};

		return fuPublic;
	};

	window.common = common();
})(jQuery);