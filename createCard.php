<?php
    function getRomoteImage($url, $filename = "") {
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
        $fp2=@fopen($path, "a"); 
        fwrite($fp2, $img); 
        fclose($fp2); 
        return $path; 
    }
    echo "<img src=\"" . getRomoteImage("", "") . "\">";
?>