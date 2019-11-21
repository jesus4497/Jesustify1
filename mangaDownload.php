<?php

if(!empty($_GET['file'])){
    $fileName=basename($_GET['file']);
    $filepath='img/'.$fileName;
    if(!empty($fileName) && file_exists($filepath)){
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-type: application/zip");
        header("Content-Transfer-Encoding: binary");

        //read the file

        readfile($filepath);
        exit;

    }
}