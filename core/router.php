<?php

class Router {
	
function request($request) {

$docroot = $_SERVER['DOCUMENT_ROOT'];

switch ($request) {
    case '/' :
        require $docroot . '/views/home.php';
        break;
    case '' :
        require $docroot . '/views/home.php';
        break;
	case '/ajax' :
        require $docroot . '/views/ajax.php';
        break;
	case '/ajax/' :
        require $docroot . '/views/ajax.php';
        break;
    default:
        http_response_code(404);
        require $docroot . '/views/404.php';
        break;
}

}
}