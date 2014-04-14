<?php
    function getRemoteImage($url, $filename = "") {
        if($url == "") {
            $url = "./imgs/default.png";
        }
        if($filename == "") {
            $ext = strrchr($url, ".");
            if($ext != ".gif" && $ext != ".jpg" && $ext != ".png") {
                return false;
            }
            $filename = date("dMYHis").$ext;
        } 
        ob_start();
        readfile($url);
        $img = ob_get_contents();
        ob_end_clean();
        $size = strlen($img);
        $path = "./profiles/" . $filename;
        $fp=fopen($path, "a");
        @fwrite($fp, $img);
        @fclose($fp);
        return $path;
    }

    date_default_timezone_set("PRC");
    header("Content-Type: text/html; charset=utf-8");
    // echo "<img src=\"" . getRemoteImage("", "") . "\">";
    echo $_GET["callback"] . "({\"card\": {\"card_url\": \"" . getRemoteImage($_GET["userpic"], "") . "\"}})";
?>