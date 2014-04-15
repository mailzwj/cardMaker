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
        <form action="createCard.php" class="card-form" id="CardForm" method="post">
            <div class="text-box">
                <div class="text-main">
                    <div class="base-info clearfix">
                        <p class="username">
                            <span class="usernick">
                                <input type="text" class="short-text" name="nick" id="UserNick" placeholder="花名">
                            </span>&nbsp;
                            <span class="truename">
                                <input type="text" class="short-text" name="tname" id="UserName" placeholder="真名">
                            </span>&nbsp;&nbsp;
                            <span class="post">
                                <input type="text" class="long-text" name="post" id="UserPost" placeholder="职位">
                            </span>
                        </p>
                        <!-- <p class="userbu">
                            <span class="big-bu"><input type="text" class="short-text" name="bbu" id="BigBu" placeholder="部门"></span> - <span class="small-bu"><input type="text" class="short-text" name="sbu" id="SmallBu" placeholder="组"></span>
                        </p> -->
                    </div>
                    <p class="contact">
                        <input type="text" class="big-text" name="phone" id="Phone" placeholder="电话号码">
                    </p>
                    <p class="contact line2">
                        <input type="text" class="big-text" name="email" id="Email" placeholder="电子邮件">
                    </p>
                    <p class="address">
                        杭州市萧山区金城路1038号国际创业中心13楼
                    </p>
                </div>
            </div>
            <div class="head-area">
                <input type="hidden" name="userpic" id="UserPic" value="./imgs/default.png">
                <div class="head-pic" id="HeadPic" style="background-image: url(./imgs/default.png);"></div>
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>上传头像</span>
                    <input id="fileupload" type="file" name="files">
                </span>
                <div class="user-info">
                    <input type="text" name="group" id="UserGroup" class="group mini-text" placeholder="组">&nbsp;
                    <input type="text" name="tid" id="UserId" class="mini-text" placeholder="工号">
                </div>
            </div>
        </form>
        <!-- 上传进度条 -->
        <div id="progress" class="progress">
            <div class="progress-bar progress-bar-success"></div>
        </div>
        <!-- 临时：返回数据写入测试 -->
        <!-- <div id="files" class="files"></div> -->
    </div>
    <div class="other-action">
        <input type="button" id="CreateCard" value="生成名片" class="btn btn-primary">
    </div>
    <div class="result" id="Result"></div>
<script src="./js/jquery-1.11.0.min.js"></script>
<script src="./js/jquery.ui.widget.js"></script>
<script src="./js/jquery.iframe-transport.js"></script>
<script src="./js/jquery.fileupload.js"></script>
<script src="./js/index.js"></script>
</body>
</html>