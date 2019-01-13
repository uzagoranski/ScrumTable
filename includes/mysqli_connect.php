<?php 

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '1234');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'scrumtable');

$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$dbc) {
	trigger_error ('Could not connect to MySQL: ' . mysqli_connect_error() );
} 
else 
{ 
	mysqli_set_charset($dbc, 'utf8');
}