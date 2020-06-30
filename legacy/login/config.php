<?php
// This file setups the database connection on the server
   define('DB_SERVER', '107.170.209.236');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'TOOR');
   define('DB_DATABASE', 'ims_test');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>
