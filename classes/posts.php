<?php
	/**
	 * Created by PhpStorm.
	 * User: navin
	 * Date: 12/19/2017
	 * Time: 5:38 PM
	 */

	class posts extends functions {
		public function getAllPosts( $count = 10, $page = 1 ) {
			$sql    = "SELECT * FROM posts AS p LEFT JOIN users AS a ON a.id = p.author_id WHERE p.status='active' ORDER BY a.created_at DESC LIMIT :limit OFFSET :offset";
			$offset = ( ( ( $page * $count ) - $count ) + 1 );
			$qry    = functions::$conn->prepare( $sql );
			$qry->bindParam( ':limit', $count );
			$qry->bindParam( ':offset', $offset );
			$res = $qry->execute()->fetchAll( PDO::FETCH_ASSOC );

			return $res;
		}

		public function getAllPostsByAuthor( $author, $count = 10, $page = 1 ) {
			$sql    = "SELECT * FROM posts AS p LEFT JOIN users AS a ON a.id = p.author_id WHERE a.id = :author_is ORDER BY a.created_at DESC LIMIT :limit OFFSET :offset";
			$offset = ( ( ( $page * $count ) - $count ) + 1 );
			$qry    = functions::$conn->prepare( $sql );
			$qry->bindParam( ':author_id', $author );
			$qry->bindParam( ':limit', $count );
			$qry->bindParam( ':offset', $offset );
			$res = $qry->execute()->fetchAll( PDO::FETCH_ASSOC );

			return $res;
		}
	}