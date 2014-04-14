<?php
    $host = $_SERVER["HTTP_HOST"];
    $port = $_SERVER["SERVER_PORT"];
    $url = $port === "80" ? "http://" . $host : "http://" . $host . ":" . $port;
    // echo $url;
?>
<!doctype html>
<html lang="ZH">
<head>
    <meta charset="UTF-8">
    <title>卡当名片生成器</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/jquery.fileupload.css">
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <div class="card">
        <form action="createCard.php" class="card-form" method="post">
            <div class="text-box">
                <div class="text-main">
                    <div class="base-info clearfix">
                        <p class="username">
                            <span class="usernick">九龄</span>&nbsp;<span class="truename">颜慧清</span>&nbsp;&nbsp;<span class="workid">019</span>
                        </p>
                        <p class="userbu">
                            <span class="big-bu">UED</span> - <span class="small-bu">设计组</span>
                        </p>
                    </div>
                    <p class="contact">
                        <i class="icons icons-phone"></i>&nbsp;13967105449&nbsp;&nbsp;<i class="icons icons-mail"></i>&nbsp;huiqing.yan@kadang-inc.com
                    </p>
                    <p class="address">
                        杭州市萧山区金城路1038号国际创业中心13楼
                    </p>
                </div>
            </div>
            <div class="head-area">
                <img class="head-pic" src="<?php echo $url; ?>/imgs/default.png" alt="">
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>上传头像</span>
                    <input id="fileupload" type="file" name="files">
                </span>
            </div>
        </form>
        <!-- 上传进度条 -->
        <div id="progress" class="progress">
            <div class="progress-bar progress-bar-success"></div>
        </div>
        <!-- 临时：返回数据写入测试 -->
        <div id="files" class="files"></div>
    </div>
<script src="./js/jquery-1.11.0.min.js"></script>
<script src="./js/jquery.ui.widget.js"></script>
<script src="./js/jquery.iframe-transport.js"></script>
<script src="./js/jquery.fileupload.js"></script>
<script src="./js/index.js"></script>
</body>
</html>