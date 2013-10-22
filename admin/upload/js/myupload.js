
var FileUpload = function(inputFile) {
	var publicMethods = {};
	var sInputFile = inputFile;
	var $inputFile = $(inputFile);
	var acceptFileTypes = {
		'img' : '/(\.|\/)(gif|jpe?g|png)$/i'
	};
	
	var params = {
			url: '',
			dataType: 'json',
			autoUpload: true
		};

	publicMethods.init = init = function(options) {
		
		$.extend(params, options);

		if (options.hasOwnProperty('acceptFileTypes')) {
			params['acceptFileTypes'] = acceptFileTypes[options.acceptFileTypes];
		}

		if (options.hasOwnProperty('maxFileSize')) {
			params['maxFileSize'] = options.maxFileSize * 1000000;
		}

		

		var $fnFileUpload = $inputFile.fileupload(params);
		$fnFileUpload.bind('fileuploadprocessalways', always)
				.bind('fileuploadprogressall', progress)
				.bind('fileuploadfail', fail);
//				.bind('fileuploaddone', function(){
//			console.log('fun')
//				});
		
	};
	
	params.done = function (e, data) {
		var file = data.result.name;
		var $wrap = $('<span class="fItem" />');
		var $exibir = $('<a/>')
                .attr('target', '_blank')
                .prop('href', '../upload/temp/'+file)
				.text('exibir');		
		var $del = $('<a/>')
                .attr('target', '_blank')
                .prop('href', '../upload/deletar.php?img='+file)
				.text('del');		
		$del.click(function(){
			$(this).parent()
					.remove();
		});
		
		$wrap.append($exibir)
			.append('<span> - </span>')
			.append($del);
		$('#fileupload').siblings('span').text('Add Files');
		$('#files').append($wrap);
	};

	function always(e, data) {
		if(data.files[0].error)
			alert(data.files[0].error);
	}
	
	function progress(e, data) {
		
		var progress = parseInt(data.loaded / data.total * 100, 10);
		$('#progress .progress-bar').css(
				'width',
				progress + '%'
				);
		$(sInputFile).siblings('span').text(progress+'% Carregando...');	
	}

	

	function fail(e, data){
		console.log(data);
	}
	
	return publicMethods;
};


       