<?php
/**
 * The file doc comment
 * php version 7.2.10
 * 
 * @category Class
 * @package  Package
 * @author   Original Author <author@example.com>
 * @license  https://www.cedcoss.com cedcoss 
 * @link     link
 */

$siteurl = "http://localhost/cedcoss/task/onlineTest/";

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "onlinetest";

global $conn; 

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("Connection Faild: " . mysqli_connect_error());
}
// echo "Connection Success"; 

?>