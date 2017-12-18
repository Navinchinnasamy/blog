<?php
	require_once( "../config/config.php" );
	spl_autoload_register( function ( $class_name ) {
		include '../classes/' . $class_name . '.php';
	} );
	$fn    = functions::getInstance();
	$files = $_FILES;

	$post = $_POST;
	switch ( $post['reqfor'] ) {
		case "create_post":
			unset( $post['reqfor'] );
			$post['author_id']        = 1;
			$response['notification'] = array();

			$res = $fn->insertUpdate( 'posts', $post );
			if ( $res == "success" ) {
				// POSTED SUCCESSFULLY
				$response['notification']['type']    = "success";
				$response['notification']['title']   = "Post Success";
				$response['notification']['message'] = "Your Post has been published successfully";
			} else {
				// ERROR IN POSTING
				$response['notification']['type']    = "error";
				$response['notification']['title']   = "Post Failed.";
				$response['notification']['message'] = "Something went wrong while publishing your Post.";
			}
			$fn->setSession( $response );
			header( "Location: write_blog.php" );
			break;
		default:
			break;
	}

	function createPost( $inp ) {

	}

?>