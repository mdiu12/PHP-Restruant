<?php
// Error Reporting Turn On
ini_set('error_reporting', E_ALL);

// Setting up the time zone
date_default_timezone_set('Asia/Dhaka');

// Host Name
$dbhost = 'localhost';

// Database Name
$dbname = 'restcafecms';

// Database Username
$dbuser = 'root';

// Database Password
$dbpass = '';

// Defining base url

// If you do not understand about BASE_URL setup, just skip the lines that are given below:
define("BASE_URL", "http://localhost/restcafecms/");

// If you are familier about base url and mod_rewrite mode, then follow these steps (if necessary):
/* 
1. If you want to make all the URLs as SEO friendly URLs, you will have to use the .htaccess file that is coming with the script. Some server can make it hidden. So make sure that you have uploaded it correctly in your server. 
2. You will have to activate the mod_rewrite in your server and then setup the base url of your website like the following line:
define("BASE_URL", "http://yourwebsite.com/");
*/

// MOD REWRITE
// You can make MOD_REWRITE "Off" or "On". But become careful. If you make this "On", you must have to setup BASE URL correctly. Otherwisre, the script will not work.
define("MOD_REWRITE", "Off");

if(MOD_REWRITE == 'Off') {
	define("URL_CATEGORY", "category.php?slug=");
	define("URL_PAGE", "page.php?slug=");
	define("URL_NEWS", "news.php?slug=");
	define("URL_SERVICE", "service.php?slug=");
	define("URL_CHEF", "chef.php?slug=");
	define("URL_SEARCH", "search.php");
} else {
	define("URL_CATEGORY", "category/");
	define("URL_PAGE", "page/");
	define("URL_NEWS", "news/");
	define("URL_SERVICE", "service/");
	define("URL_CHEF", "chef/");
	define("URL_SEARCH", "search");
}


try {
	$pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch( PDOException $ex ) {
    echo "Connection error :" . $ex->getMessage();
}