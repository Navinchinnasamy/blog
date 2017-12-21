<?php
	require_once( "../config/config.php" );
	spl_autoload_register( function ( $class_name ) {
		include '../classes/' . $class_name . '.php';
	} );

	$fn = functions::getInstance();
	$p  = posts::getInstance();

	$files = $_FILES;
	$post  = $_POST;
	switch ( $post['reqfor'] ) {
		case "create_post":
			unset( $post['reqfor'] );
			$uh   = new UploadHandler();
			$uhr  = json_encode( $uh );
			$uhra = json_decode( $uhr, true );
			$fres = $uhra['response']['file'][0];

			$post['author_id']  = $fn::getSession()['author']['author_id'];
			$post['post_image'] = $fres['url'];

			$response['notification'] = array();
			$res                      = $fn->insertUpdate( 'posts', $post );
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
			//header( "Location: write_blog.php" );
			break;

		case "getPostsByAuthor":
			$posts = $p->getAllPostsByAuthor( $fn::getSession()['author']['author_id'], $post['count'], $post['page'] );
			print_r( json_encode( $posts ) );
			break;

		case "postUpdate":
			unset( $post['reqfor'] );
			$posts = $fn->insertUpdate( 'posts', $post, array( 'for' => 'update' ) );
			print_r( json_encode( $posts ) );
			break;

		default:
			break;
	}
?>