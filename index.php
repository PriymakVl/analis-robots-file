<?php
ini_set('display_errors','Off');

include_once 'classes/RobotsTxt.php';
include_once 'functions.php';

if (isset($_POST['url'])) {
    $url = $_POST['url'];   
}
else {
    include_once 'views/form.php';
    exit();
}

try {

    $robotsTxt = new RobotsTxt($url);

//    mydebug($response);
} catch (Exception $ex) {
    $error = $ex->getMessage();
    include_once 'views/error.php';
    exit();
}

    $message = parse_ini_file('messages.ini', true);
    
    $response ['site'] = $robotsTxt->site;
    
    $response['exist_file'] = get_response($robotsTxt->directives, $message, 'exist_file');
    
    $response['exist_host'] = get_response($robotsTxt->host, $message, 'exist_host');
    
    $param_count_host = (count($robotsTxt->host) == 1) ? true : false;           
    $response['count_host'] = get_response($param_count_host, $message, 'count_host');
    
    $param_file_size = ($robotsTxt->file_size <= $robotsTxt->FILE_MAX_SIZE) ? true : false;
    $response['file_size'] = get_response($param_file_size, $message, 'file_size', $robotsTxt->file_size.' байт');
    
    $response['exist_sitemap'] = get_response($robotsTxt->sitemap, $message, 'exist_sitemap');
    
    $param_code_response = ($robotsTxt->code_response === 200) ? true : false;           
    $response['code_response'] = get_response($param_code_response, $message, 'code_response', $robotsTxt->code_response);



include_once 'views/result.php';
