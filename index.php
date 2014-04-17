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
                        <select class="long-long-text" name="company" id="Company" style="width: 220px;">
                            <option value="无极卡当网络科技（杭州）有限公司">无极卡当网络科技（杭州）有限公司</option>
                            <option value="杭州卡当礼品有限公司">杭州卡当礼品有限公司</option>
                            <option value="杭州皆可定网络科技有限公司">杭州皆可定网络科技有限公司</option>
                        </select>
                    </p>
                    <p class="contact line2">
                        <input type="text" class="big-text" name="phone" id="Phone" placeholder="电话、QQ">
                    </p>
                    <p class="contact line2">
                        <input type="text" class="long-long-text" name="email" id="Email" placeholder="电子邮件">
                    </p>
                    <p class="address">
                        杭州市萧山区金城路1038号国际创业中心
                        <select class="mini-text" name="floor" id="Floor">
                            <option value="13">13</option>
                            <option value="10">10</option>
                        </select>
                        楼
                    </p>
                </div>
            </div>
            <div class="head-area">
                <input type="hidden" name="userpic" id="UserPic" value="./imgs/default.png">
                <div class="head-pic" id="HeadPic" style="background-image: url(./imgs/default.png);"></div>
                <span class="btn btn-success fileinput-button">
                    <!-- <i class="glyphicon glyphicon-plus"></i>
                    <span>上传头像</span> -->
                    <input id="fileupload" type="file" name="files">
                </span>
                <div class="user-info">
                    <input type="text" name="group" id="UserGroup" class="group mini-text" placeholder="部门">&nbsp;
                    <input type="text" name="tid" id="UserId" class="mini-text" placeholder="组">
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
    <div class="download" id="Download">
        <a href="javascript:void(0);" id="DownCard" class="btn btn-success">下载名片</a>
    </div>
    <div class="help">
        <h3 class="help-title">使用说明</h3>
        <div class="help-content">
            &nbsp;&nbsp;&nbsp;&nbsp;1、头像规格（140x140），大图等比压缩。<br>
            &nbsp;&nbsp;&nbsp;&nbsp;2、图片格式（png/jpg/gif），png24最佳。<br>
            &nbsp;&nbsp;&nbsp;&nbsp;3、点击“生成名片”后，“右键”—“图片另存为...”，即得到个人名片。<br>
            &nbsp;&nbsp;&nbsp;&nbsp;4、生成案例，请对照填写相关信息
            <img src="./imgs/myCard.png" alt="" style="margin-top: 5px;">
        </div>
        <span class="glyphicon glyphicon-hand-up help-icon"></span>
    </div>
<script src="./js/jquery-1.11.0.min.js"></script>
<script src="./js/jquery.ui.widget.js"></script>
<script src="./js/jquery.iframe-transport.js"></script>
<script src="./js/jquery.fileupload.js"></script>
<script src="./js/index.js"></script>
</body>
</html>