<?php 

$arrayOfFileNames = array();
$fileList = glob('./pages/*');


if (isset($_SERVER['PATH_INFO'])) {
    $page = explode("/", $_SERVER['PATH_INFO'])[1];
    $page = preg_replace('/[^a-zA-Z0-9_]/', "", $page);
}

foreach($fileList as $filename){
    if(is_file($filename) && ((basename($filename) != "footer") || (basename($filename) != "header"))){
        $arrayOfFileNames[] = basename($filename, ".php");
    }   
}



if(isset($page)) {
    foreach($arrayOfFileNames as $e) {
        if($page == $e) {
            require_once("./pages/" . $e . ".php");
        } 
    }
}

?>