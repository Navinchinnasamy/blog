<?php
require_once("../config/config.php");
spl_autoload_register(function ($class_name) {
	include '../classes/'.$class_name . '.php';
});
$files = $_FILES;
$fn = new functions(DB_TYPE, HOST, DATABASE, DB_USER, DB_PASSWORD, PORT);
$conn = $fn::$conn;

$post = $_POST;
switch($post['reqfor']){
	case "create_post":
		unset($post['reqfor']);
		$post['author_id'] = 1;
		$res = $fn->insertUpdate('posts', $post);
		if($res == "success"){
			// POSTED SUCCESSFULLY
		} else{
			// ERROR IN POSTING
		}
		break;
	default:
		break;
}

function createPost($inp){
	
}
?>