<?php
	$files = $_FILES;
	$post = $_POST;
	print_r(json_encode($files));
	print_r(json_encode($post));
?>