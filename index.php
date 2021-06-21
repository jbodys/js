<?php

#var_dump($_GET);

$list = key($_GET);
$list = str_replace('_','.',$list);
#var_dump($list);

$list = explode('?',$list);
#var_dump($list);


foreach($list as $file){

    $file_target = 'test.js';
    download('https://' . $file, $file_target);
    readfile($file_target);
}


function download($file_source, $file_target) {
    $rh = fopen($file_source, 'rb');
    $wh = fopen($file_target, 'w+b');
    if (!$rh || !$wh) {
        return false;
    }

    while (!feof($rh)) {
        if (fwrite($wh, fread($rh, 4096)) === FALSE) {
            return false;
        }
        echo ' ';
        flush();
    }

    fclose($rh);
    fclose($wh);

    return true;
}
