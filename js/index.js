(function($){
    var uploadApi = "./upload.php",
        createApi = "./createCard.php";

    $('#fileupload').fileupload({
        url: uploadApi,
        dataType: 'json',
        submit: function(e, file) {
            var localPath = file.fileInput[0].value;
            if (!/\.(png|jpe?g|gif)$/ig.test(localPath)) {
                alert("请上传jpg/gif/png格式的图片！");
                return false;
            }
        },
        done: function (e, data) {
            if (data.textStatus !== "success") {
                alert("上传失败！");
                return false;
            }
            $.each(data.result.files, function (index, file) {
                // $('<p/>').html("<img src=\"" + file.thumbnailUrl + "\">").appendTo('#files');
                // console.log(file);
                $("#HeadPic").css("backgroundImage", "url(" + file.thumbnailUrl + ")");
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
        var inps = $("input[placeholder!='']");
        var params = "";
        // var api = createApi + "?" + params + "&callback=?";
        var api = "";
        var emps = [];
        inps.each(function(index, item){
            if ($(item).attr("placeholder") === $(item).val()) {
                $(item).val("");
                emps.push(item);
            }
        });
        params = $("#CardForm").serialize();
        api = createApi + "?" + params;
        $.each(emps, function(index, item){
            $(item).val($(item).attr("placeholder"));
        });
        // $("#Result").html('<img src="' + api + '">');
        $.ajax({
            url: api + "&callback=?",
            dataType: "jsonp",
            success: function(data){
                if (data && data.card) {
                    $("#Result").html('<img src="' + data.card + '">');
                    $("#DownCard").attr("href", "./download.php?pic=" + encodeURIComponent(data.card)).parent().css("display", "block");
                }
            }
        })
    });

    if(!("placeholder" in document.createElement("input"))){
        $.getScript("./js/jquery.placeholder.1.3.min.js",function(){
            $.Placeholder.init();
        });
    }

})(jQuery);