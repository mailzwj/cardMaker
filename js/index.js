(function($){
    $('#fileupload').fileupload({
        url: "./upload.php",
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').html("<img src=\"" + file.thumbnailUrl + "\">").appendTo('#files');
                console.log(file);
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
})(jQuery);