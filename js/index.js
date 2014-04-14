(function($){
    var uploadApi = "./upload.php",
        createApi = "./createCard.php";

    $('#fileupload').fileupload({
        url: uploadApi,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                // $('<p/>').html("<img src=\"" + file.thumbnailUrl + "\">").appendTo('#files');
                // console.log(file);
                $("#HeadPic").attr("src", file.thumbnailUrl);
                $("#UserPic").val(file.thumbnailUrl);
            });
        },
        progressall: function (e, data) {
            // var progress = parseInt(data.loaded / data.total * 100, 10);
            // $('#progress .progress-bar').css(
            //     'width',
            //     progress + '%'
            // );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');

    $("#CreateCard").click(function(){
        var params = $("#CardForm").serialize();
        var api = createApi + "?" + params + "&callback=?";
        $.ajax({
            "url": api,
            "dataType": "jsonp",
            "success": function(data){
                $("body").append('<img src="' + data.card["card_url"] + '">');
            }
        });
    });
})(jQuery);