<?php
	/**
	 * Created by PhpStorm.
	 * User: navin
	 * Date: 12/19/2017
	 * Time: 5:38 PM
	 */

	class posts extends functions {
		private static $instance = null;

		public function __construct() {
			functions::getInstance();
		}

		public static function getInstance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function getAllPosts( $count = 10, $page = 1 ) {
			$offset = ( ( ( $page * $count ) - $count ) + 1 );
			$sql    = "SELECT * FROM posts AS p LEFT JOIN users AS a ON a.id = p.author_id WHERE p.status='active' ORDER BY a.created_at DESC LIMIT {$count} OFFSET {$offset}";
			$qry    = functions::$conn->prepare( $sql );
			$qry->execute();
			$res = $qry->fetchAll( PDO::FETCH_ASSOC );
			return $res;
		}

		public function getAllPostsByAuthor( $author, $count = 10, $page = 1 ) {
			$offset = ( ( ( $page * $count ) - $count ) + 1 );
			$sql    = "SELECT p.id AS post_id, p.status AS post_status, p.*, a.* FROM posts AS p LEFT JOIN users AS a ON a.id = p.author_id WHERE a.id = :author_id ORDER BY a.created_at DESC LIMIT {$count} OFFSET {$offset}";

			$qry    = functions::$conn->prepare( $sql );
			$qry->bindParam( ':author_id', $author, PDO::PARAM_INT );
			$qry->execute();
			$res = $qry->fetchAll( PDO::FETCH_ASSOC );

			return $res;
		}
	}