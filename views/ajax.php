<?php 
header('Content-Type: application/json');  

function exitajax($string = 'fail') {
	$data['info'] = $string;
	echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	die();
}

if (!isset($_POST["method"])) {
	exitajax();
} else {
	switch ($_POST["method"]) {
	case 'ajaxadduser': ajaxadduser();break;
	case 'ajaxaddrole': ajaxaddrole();break;
	case 'ajaxgetroles': ajaxgetroles();break;
	case 'ajaxgetusers': ajaxgetusers();break;
	}
}

function ajaxadduser() {	
	$data = array(); 
	
	if (!empty($_POST["username"]) && !empty($_POST["role_id"])) {
	$username = strtolower(strip_tags($_POST["username"]));
	$role_id = $_POST["role_id"]; 
	} else {
	exitajax('Переданы не все поля');
	}

	if (!is_numeric($role_id)) {
    exitajax('Не числовой ID роли');
	}
	
	if (!preg_match("/^[a-z]+$/", $username)) {
	exitajax('Допустимы только английские символы в имени пользователя');
	}
	
	$userdata = new UserData();
	$result = $userdata->addUser($username,$role_id);
	if ($result == false) exitajax('Ошибка при сохранении в базу');
	
	$data['info'] = 'success';
	echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);	
    die();
}

function ajaxaddrole() {	
	$data = array(); 
	
	if (!empty($_POST["rolename"])) {
	$rolename = strtolower(strip_tags($_POST["rolename"]));
	} else {
	exitajax('Переданы не все поля');
	}
	
	if (!preg_match("/^[a-z]+$/", $rolename)) {
	exitajax('Допустимы только английские символы');
	}
	
	$roledata = new RoleData();
	$result = $roledata->addRole($rolename);
	if ($result == false) exitajax('Ошибка при сохранении в базу');
	
	$data['info'] = 'success';
	echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);	
    die();
}

function ajaxgetroles() {	
	$data = array(); 

	$roledata = new RoleData();
	$result = $roledata->getRoles();	
	if ($result == false) exitajax('Ошибка при загрузке из базы');
	
	$data['data'] = $result;
	$data['info'] = 'success';
	echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);	
    die();
}

function ajaxgetusers() {	
	$data = array(); 

	$userdata = new UserData();
	$result = $userdata->getUsers();	
	if ($result == false) exitajax('Ошибка при загрузке из базы');
	
	$data['data'] = $result;
	$data['info'] = 'success';
	echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);	
    die();
}