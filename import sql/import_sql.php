<?php

// Name of the file
$filename = '../design/14.sql';
// MySQL host
$mysql_host = 'localhost';
// MySQL username
$mysql_username = 'root';
// MySQL password
$mysql_password = '';
// Database name
$mysql_database = '14';

// Connect to MySQL server
include('../connect.php');
// Select database
// mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());

//drop all tables
// use `14`;
$sql = "DROP TABLE IF EXISTS staff;";
mysqli_query($connect,$sql);

$sql = "DROP TABLE IF EXISTS order_details;";
mysqli_query($connect,$sql);

$sql = "DROP TABLE IF EXISTS orders;";
mysqli_query($connect,$sql);

$sql = "DROP TABLE IF EXISTS items;";
mysqli_query($connect,$sql);

$sql = "DROP TABLE IF EXISTS customers;";
mysqli_query($connect,$sql);

// echo($sql);

// die(mysqli_error($connect));

// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
    // Perform the query
    mysqli_query($connect,$templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_error($connect) . '<br /><br />');
    // Reset temp variable to empty
    $templine = '';
}
}
 echo "Tables imported successfully";
?>

<button onclick="window.location='index.php';"> back</button>