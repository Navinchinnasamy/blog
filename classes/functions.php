<?php
/* Basic operations to be done */
	require_once "../config/config.php";

class functions {
	private static $instance = null;
	public static $conn = null;
	public $user = array();

	public function __construct($db_type, $host, $db_name, $db_user, $db_pass, $port){
		if(!isset($_SESSION)){
			session_start();
		}

		if($db_type == "postgres"){
			try {
				self::$conn = new PDO("pgsql:host={$host};port={$port};dbname={$db_name}", $db_user, $db_pass);
				self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();
				exit;
			}
		} else{
			try {
				self::$conn = new PDO("mysql:host={$host};dbname={$db_name}", $db_user, $db_pass);
				self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $e){
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

	public function setSession($values){
		if ( ! isset( $_SESSION[ BASE_FOLDER ] ) ) {
			$_SESSION[ BASE_FOLDER ] = array();
		}
		foreach($values as $k => $v){
			$_SESSION[ BASE_FOLDER ][ $k ] = $v;
		}
	}

	public function getCurrentUser(){
		$this->user = $_SESSION[ BASE_FOLDER ]['user'];
		return $this->user;
	}

	public static function clearSession() {
		$_SESSION[ BASE_FOLDER ] = array();
		session_destroy();
	}

	public function getMasters($table, $id=null, $orderColumn = 'id', $order = 'ASC'){
		$where  = ($id > 0) ? " AND id = :id " : "";
		$sql = "SELECT * FROM `{$table}` WHERE status='active' {$where} ORDER BY `{$orderColumn}` {$order}";
		$qry = self::$conn->prepare($sql);

		if($id > 0){
			$qry->bindValue(':id', $id);
		}
		// array(':table' => $table, ':where' => $where, ':orderColumn' => $orderColumn, ':order' => $order)
		$qry->execute();
		$result = $qry->fetchAll(PDO::FETCH_ASSOC);
		//$qry->close();
		return $result;
	}

	public function insertUpdate($table, $inp, $other = null){
		$columns = array_keys($inp);
		$values = str_repeat("?, ", count($columns));
		$values = trim($values, ', ');
		$columns = implode(', ', $columns);
		$sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
		if(!empty($other)){
			if(isset($other['for']) && $other['for'] == "update"){
				$sql = "UPDATE {$table} ";
			}
		}
		$values = array_values($inp);
		$qry = self::$conn->prepare($sql);
		for($i = 1; $i <= count($values); $i++){
			$qry->bindValue($i, $values[$i-1]);
		}
		$qry->execute();
		//$qry->close();
		return "success";
	}

	public function checkDuplicate($table, $column, $value){
		$where  = " AND {$column} = :value ";
		$sql = "SELECT * FROM `{$table}` WHERE status='active' {$where}";
		$qry = self::$conn->prepare($sql);
		$qry->bindValue(':value', $value);

		$qry->execute();
		$result = $qry->fetchAll(PDO::FETCH_ASSOC);
		//$qry->close();
		return $result;
	}
}
?>