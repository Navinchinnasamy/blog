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
			$offset = ( ( ( $page * $count ) - $count ) );
			$sql    = "SELECT p.id AS post_id, p.status AS post_status, p.created_at AS post_date, pc.category, p.*, a.* FROM posts AS p LEFT JOIN users AS a ON a.id = p.author_id LEFT JOIN post_categories AS pc ON pc.id = p.post_category_id WHERE p.status='active' ORDER BY a.created_at DESC LIMIT {$count} OFFSET {$offset}";
			$qry    = functions::$conn->prepare( $sql );
			$qry->execute();
			$res = $qry->fetchAll( PDO::FETCH_ASSOC );
			return $res;
		}

		public function getAllPostsByAuthor( $author, $count = 10, $page = 1 ) {
			$offset = ( ( ( $page * $count ) - $count ) );
			$sql    = "SELECT p.id AS post_id, p.status AS post_status, p.created_at AS post_date, pc.category, p.*, a.* FROM posts AS p LEFT JOIN users AS a ON a.id = p.author_id LEFT JOIN post_categories AS pc ON pc.id = p.post_category_id WHERE a.id = :author_id ORDER BY a.created_at DESC LIMIT {$count} OFFSET {$offset}";

			$qry    = functions::$conn->prepare( $sql );
			$qry->bindParam( ':author_id', $author, PDO::PARAM_INT );
			$qry->execute();
			$res = $qry->fetchAll( PDO::FETCH_ASSOC );

			return $res;
		}
	}