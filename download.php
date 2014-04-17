<?php

    if (isset($_GET["pic"])) {
        $file = $_GET["pic"];
        $fsize = getimagesize($file);
        header('Content-type: ' . $fsize['mime']);
        header("Content-Disposition: attachment; filename=" . basename($file));
        @readfile($file);
        exit;
    } else {
        echo "下载失败！请在生成页面使用鼠标‘右键’—‘图片另存为...’";
    }
?>