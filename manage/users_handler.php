<?php
require_once("../config/config.php");
spl_autoload_register(function ($class_name) {
	include '../classes/'.$class_name . '.php';
});
$files = $_FILES;
$fn = new functions(DB_TYPE, HOST, DATABASE, DB_USER, DB_PASSWORD, PORT);
$conn = $fn::$conn;
$sesn = $fn->getSession(BASE_FOLDER);
$post = $_POST;
switch($post['reqfor']){
	case "author_login":
		$dup = $fn->checkDuplicate('users', 'username', $post['username']);
		$response['notification'] = array();
		$redir_to = "login.php";
		if(count($dup) > 0){
			if(md5($post['password']) == $dup[0]['password']){
				$response['notification']['type'] = "success";
				$response['notification']['title'] = "Login Success";
				$response['notification']['message'] = "Logged-in successfully";
				$author = array('author' => array('author_id' => $dup[0]['id'], 'author_name' => $dup[0]['display_name'], 'author_email' => $dup[0]['email'], 'author_mobile' => $dup[0]['mobile'], 'role_id' => $dup[0]['role_id']));
				$fn->setSession($author);
				$redir_to = "write_blog.php";
				goto tologinresponse;
			}
		}
		
		$response['notification']['type'] = "error";
		$response['notification']['title'] = "Login Failed.";
		$response['notification']['message'] = "Invalid login credentials.";
		
		tologinresponse:
		$fn->setSession($response);
		header("Location: {$redir_to}");
		break;
	default:
		break;
}

function createPost($inp){
	
}
?>