<?php

 define('DB_HOST', 'localhost');
 define('DB_USER', 'root');
 define('DB_PASS', '');
 define('DB_NAME', 'loginreg');

 $contact = mysqli_connect (DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('oops!! sorry. got some bugs to fix.');

 mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 $contact->set_charset("utf8mb4");
?> 