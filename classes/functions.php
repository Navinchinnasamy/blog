<?php
	/* Basic operations to be done */
	require_once "../config/config.php";

	class functions {
		public static $conn = null;
		private static $instance = null;
		public $user = array();

		public function __construct( $db_type, $host, $db_name, $db_user, $db_pass, $port ) {
			if ( ! isset( $_SESSION ) ) {
				session_start();
			}

			if ( $db_type == "postgres" ) {
				try {
					self::$conn = new PDO( "pgsql:host={$host};port={$port};dbname={$db_name}", $db_user, $db_pass );
					self::$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				} catch ( PDOException $e ) {
					echo "Connection failed: " . $e->getMessage();
					exit;
				}
			} else {
				try {
					self::$conn = new PDO( "mysql:host={$host};dbname={$db_name}", $db_user, $db_pass );
					self::$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				} catch ( PDOException $e ) {
					echo "Connection failed: " . $e->getMessage();
					exit;
				}
			}
		}

		public static function getInstance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self( DB_TYPE, HOST, DATABASE, DB_USER, DB_PASSWORD, PORT );
			}

			return self::$instance;
		}

		public static function getSession() {
			return $_SESSION[ BASE_FOLDER ];
		}

		public static function clearSession( $key = null ) {
			if ( $key ) {
				$_SESSION[ BASE_FOLDER ][ $key ] = array();
			} else {
				$_SESSION[ BASE_FOLDER ] = array();
				session_destroy();
			}
		}

		public function setSession( $values ) {
			if ( ! isset( $_SESSION[ BASE_FOLDER ] ) ) {
				$_SESSION[ BASE_FOLDER ] = array();
			}
			foreach ( $values as $k => $v ) {
				$_SESSION[ BASE_FOLDER ][ $k ] = $v;
			}
		}

		public function getCurrentUser() {
			$this->user = $_SESSION[ BASE_FOLDER ]['user'];

			return $this->user;
		}

		public function getMasters( $table, $id = null, $orderColumn = 'id', $order = 'ASC' ) {
			$where = ( $id > 0 ) ? " AND id = :id " : "";
			$sql   = "SELECT * FROM `{$table}` WHERE status='active' {$where} ORDER BY `{$orderColumn}` {$order}";
			$qry   = self::$conn->prepare( $sql );

			if ( $id > 0 ) {
				$qry->bindValue( ':id', $id );
			}
			// array(':table' => $table, ':where' => $where, ':orderColumn' => $orderColumn, ':order' => $order)
			$qry->execute();
			$result = $qry->fetchAll( PDO::FETCH_ASSOC );

			//$qry->close();
			return $result;
		}

		public function insertUpdate( $table, $inp, $other = null ) {
			$columns    = array_keys( $inp );
			$values     = str_repeat( "?, ", count( $columns ) );
			$values     = trim( $values, ', ' );
			$inscolumns = implode( ', ', $columns );
			$sql        = "INSERT INTO {$table} ({$inscolumns}) VALUES ({$values})";

			$values = array_values( $inp );

			if ( ! empty( $other ) ) {
				if ( isset( $other['for'] ) && $other['for'] == "update" ) {
					$updcolumns    = implode( '=?, ', $columns );
					$update_column = isset( $other['update_column'] ) ?: "id";
					$sql           = "UPDATE {$table} SET {$updcolumns}=? WHERE {$update_column} = ?";
				}
			}

			$qry = self::$conn->prepare( $sql );
			for ( $i = 1; $i <= count( $values ); $i ++ ) {
				$qry->bindValue( $i, $values[ $i - 1 ] );
			}

			if ( isset( $other['for'] ) && $other['for'] == "update" ) {
				$qry->bindValue( count( $values ) + 1, $inp[ $update_column ] );
			}

			$res = $qry->execute();

			//$qry->close();
			return $res;
		}

		public function checkDuplicate( $table, $column, $value ) {
			$where = " AND {$column} = :value ";
			$sql   = "SELECT * FROM `{$table}` WHERE status='active' {$where}";
			$qry   = self::$conn->prepare( $sql );
			$qry->bindValue( ':value', $value );

			$qry->execute();
			$result = $qry->fetchAll( PDO::FETCH_ASSOC );

			//$qry->close();
			return $result;
		}

		public function get_full_url() {
			$https = ! empty( $_SERVER['HTTPS'] ) && strcasecmp( $_SERVER['HTTPS'], 'on' ) === 0 ||
			         ! empty( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) &&
			         strcasecmp( $_SERVER['HTTP_X_FORWARDED_PROTO'], 'https' ) === 0;

			return
				( $https ? 'https://' : 'http://' ) .
				( ! empty( $_SERVER['REMOTE_USER'] ) ? $_SERVER['REMOTE_USER'] . '@' : '' ) .
				( isset( $_SERVER['HTTP_HOST'] ) ? $_SERVER['HTTP_HOST'] : ( $_SERVER['SERVER_NAME'] .
				                                                             ( $https && $_SERVER['SERVER_PORT'] === 443 ||
				                                                               $_SERVER['SERVER_PORT'] === 80 ? '' : ':' . $_SERVER['SERVER_PORT'] ) ) ) .
				substr( $_SERVER['SCRIPT_NAME'], 0, strrpos( $_SERVER['SCRIPT_NAME'], '/' ) );
		}

		public function get_server_var( $id ) {
			return @$_SERVER[ $id ];
		}
	}

?>