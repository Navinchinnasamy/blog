<?php
	require_once( "../config/config.php" );
	spl_autoload_register( function ( $class_name ) {
		include '../classes/' . $class_name . '.php';
	} );
	$fn   = functions::getInstance();
	$page = basename( $_SERVER['PHP_SELF'] );
	if ( ! isset( $_SESSION[ BASE_FOLDER ]['author'] ) && $page != "login.php" ) {
		header( "Location: login.php" );
	} else if ( isset( $_SESSION[ BASE_FOLDER ]['author'] ) && $page == "login.php" ) {
		header( "Location: write_blog.php" );
	}
?>
<head>
    <title>Admin > MyBlogs</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Navin Chinnasamy" name="author">
    <meta content="Admin dashboard" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="favicon.png" rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <!--<link href="//fast.fonts.net/cssapi/175a63a1-3f26-476a-ab32-4e21cbdb8be2.css" rel="stylesheet" type="text/css">-->
    <link href="bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
    <link href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="plugins/jquery.toast/jquery.toast.css" rel="stylesheet">
    <link href="css/main.css?version=2.6" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>