$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = 'server/upload.php';
//	 var url = 'server/php/';
       
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: true,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize: 5000000
		
    }).on('fileuploadadd', function (e, data) {
        data.context = $('<div/>').appendTo('#files');
        $.each(data.files, function (index, file) {
            var node = $('<p/>')
                    .append($('<span/>').text(file.name));
            if (!index) {
                node.append('<br>');
            }
            node.appendTo(data.context);
        });
		
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
			console.log(data.files);
        if (file.error) {
            node
                .append('<br>')
                .append(file.error);
        }
		
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
			
    }).on('fileuploaddone', function (e, data) {
       
		var file = data.result.name;
		var link = $('<a>')
                .attr('target', '_blank')
                .prop('href', file.url);		
            $('p').wrap(link);
		
    }).on('fileuploadfail', function (e, data) {
       console.log(data);
    });
});