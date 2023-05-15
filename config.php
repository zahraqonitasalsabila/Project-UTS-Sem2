<?php
/**
 * using mysqli_connect for database connection
 */
 
$databaseHost = 'localhost';
$databaseName = 'db_zahr22282ti';
$databaseUsername = 'zahr22282ti';
$databasePassword = '21330110222282';
 
$mysqli = mysqli_connect ($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

if( !$mysqli ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
?>
 