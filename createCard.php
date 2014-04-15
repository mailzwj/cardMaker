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
        if (!is_dir("./profiles")) {
            mkdir("./profiles");
            chmod("./profiles", 777);
        }
        $path = "./profiles/" . $filename;
        $fp = fopen($path, "a");
        @fwrite($fp, $img);
        @fclose($fp);
        return $path;
    }

    function getImageSource($imgurl, $mime) {
        $img = null;
        $imgext = explode("/", $mime)[1];
        switch($imgext) {
            case "png":
                $img = imagecreatefrompng($imgurl);
                break;
            case "jpeg":
                $img = imagecreatefromjpeg($imgurl);
                break;
            case "gif":
                $img = imagecreatefromgif($imgurl);
                break;
        }
        return $img;
    }

    function echoImage($mime, $source) {
        $ext = explode("/", $mime)[1];
        switch($ext) {
            case "png":
                imagepng($source);
                break;
            case "jpeg":
                imagejpeg($source);
                break;
            case "gif":
                imagegif($source);
                break;
        }
    }

    date_default_timezone_set("PRC");
    $head = getRemoteImage($_GET["userpic"], "");
    $tpl = "./imgs/tpl-new.png";

    $nick = htmlspecialchars($_GET["nick"]);
    $name = htmlspecialchars($_GET["tname"]);
    $tid = htmlspecialchars($_GET["tid"]);
    // $bu = htmlspecialchars($_GET["bbu"]);
    $group = htmlspecialchars($_GET["group"]);
    $phone = htmlspecialchars($_GET["phone"]);
    $email = htmlspecialchars($_GET["email"]);

    $headsize = getimagesize($head);
    $tplsize = getimagesize($tpl);

    // print_r($headsize);

    $headsource = getImageSource($head, $headsize["mime"]);
    $tplsource = getImageSource($tpl, $tplsize["mime"]);

    $red = imagecolorallocate($tplsource, 193, 8, 20);
    $gray = imagecolorallocate($tplsource, 153, 153, 153);
    $dark = imagecolorallocate($tplsource, 0, 0, 0);
    $white = imagecolorallocate($tplsource, 255, 255, 255);

    $yahei = "./fonts/msyh.ttf";
    $consola = "./fonts/consola.ttf";
    $sontti = "./fonts/simsun.ttc";

    imagecopy($tplsource, $headsource, 18, 35, 0, 0, $headsize[0], $headsize[1]);
    imagettftext($tplsource, 13, 0, 190, 47, $red, $yahei, $nick);
    imagettftext($tplsource, 10, 0, 245, 46, $dark, $yahei, $name);
    imagettftext($tplsource, 10, 0, 290, 46, $gray, $yahei, $tid);
    imagettftext($tplsource, 10, 0, 410, 46, $gray, $yahei, $group);
    imagettftext($tplsource, 9, 0, 210, 107, $gray, $consola, $phone);
    imagettftext($tplsource, 9, 0, 313, 107, $gray, $consola, $email);

    header("Content-Type: " . $tplsize["mime"]);
    echoImage($tplsize["mime"], $tplsource);
?>