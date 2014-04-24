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
        $fname = "./profiles/" . date("dMYHis") . "." . $ext;
        switch($ext) {
            case "png":
                imagepng($source, $fname);
                break;
            case "jpeg":
                imagejpeg($source, $fname);
                break;
            case "gif":
                imagegif($source, $fname);
                break;
        }
        return $fname;
    }

    date_default_timezone_set("PRC");
    $head = getRemoteImage($_GET["userpic"], "");
    $tpl = "./imgs/tpl-nowx.png";

    $nick = htmlspecialchars($_GET["nick"]);
    $name = htmlspecialchars($_GET["tname"]);
    $post = htmlspecialchars($_GET["post"]);
    $tid = htmlspecialchars($_GET["tid"]);
    // $bu = htmlspecialchars($_GET["bbu"]);
    $group = htmlspecialchars($_GET["group"]);
    $phone = htmlspecialchars($_GET["phone"]);
    $email = htmlspecialchars($_GET["email"]);
    $com = htmlspecialchars($_GET["company"]);
    $floor = "杭州市萧山区金城路1038号国际创业中心" . htmlspecialchars($_GET["floor"]) . "楼";

    $headsize = getimagesize($head);
    $tplsize = getimagesize($tpl);

    // print_r($headsize);

    $headsource = getImageSource($head, $headsize["mime"]);
    $tplsource = getImageSource($tpl, $tplsize["mime"]);

    $red = imagecolorallocate($tplsource, 193, 8, 20);
    $gray = imagecolorallocate($tplsource, 102, 102, 102);
    $dark = imagecolorallocate($tplsource, 0, 0, 0);
    $white = imagecolorallocate($tplsource, 255, 255, 255);

    $yahei = "./fonts/msyh.ttf";
    $consola = "./fonts/consola.ttf";
    $sontti = "./fonts/simsun.ttc";
    $tahoma = "./fonts/tahoma.ttf";
    $arial = "./fonts/arial.ttf";

    imagecopy($tplsource, $headsource, 18 + (140 - $headsize[0]) / 2, 35 + (140 - $headsize[1]) / 2, 0, 0, $headsize[0], $headsize[1]);
    imagettftext($tplsource, 10, 0, 65, 23, $white, $yahei, $group . "  " . $tid);
    imagettftext($tplsource, 13, 0, 190, 52, $red, $yahei, $nick);
    imagettftext($tplsource, 10, 0, 245, 52, $dark, $yahei, $name);
    imagettftext($tplsource, 10, 0, 295, 52, $gray, $yahei, $post);
    imagettftext($tplsource, 10, 0, 192, 98, $gray, $sontti, $com);
    // imagettftext($tplsource, 10, 0, 290, 46, $gray, $yahei, $tid);
    // imagettftext($tplsource, 10, 0, 410, 46, $gray, $yahei, $group);
    imagettftext($tplsource, 10, 0, 192, 118, $gray, $arial, $phone);
    imagettftext($tplsource, 10, 0, 192, 138, $gray, $arial, $email);
    imagettftext($tplsource, 10, 0, 192, 160, $gray, $sontti, $floor);

    // header("Content-Type: " . $tplsize["mime"]);
    $src = echoImage($tplsize["mime"], $tplsource);
    echo htmlspecialchars($_GET["callback"]) . "({\"card\":\"" . $src . "\"})";
?>