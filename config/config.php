<?php
session_start();
$environment = "production"; // development, production, demo

switch($environment) {
	case "development":
		define("HOST", "10.100.9.44");
		define("PORT", "3306");
		define("DB_USER", "navin");
		define("DB_PASSWORD", "navin21594");
		define("DATABASE", "myblog");
		define("DB_TYPE", "mysql"); // mysql, postgres
		define("BASE_FOLDER", "blogspot");
		break;
	case "production":
		define("HOST", "localhost");
		define("PORT", "3306");
		define("DB_USER", "navin");
		define("DB_PASSWORD", "navin21594");
		define("DATABASE", "myblog");
		define("DB_TYPE", "mysql"); // mysql, postgres
		define("BASE_FOLDER", "blogspot");
		break;
	case "demo":
		define("HOST", "localhost");
		define("PORT", "3306");
		define("DB_USER", "navin");
		define("DB_PASSWORD", "navin21594");
		define("DATABASE", "myblog");
		define("DB_TYPE", "mysql"); // mysql, postgres
		define("BASE_FOLDER", "blogspot");
		break;
}

define("PROTOCOL", "http://");
define("CURRENT_DATE", date('Y-m-d'));
define("CURRENT_DATE_TIME", date('Y-m-d H:i:s'));
?>