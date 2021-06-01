<?php

# Database Connection
define('Host', 'localhost'); # Server Name
define('User', 'root'); # User Name
define('Password', ''); # Password
define('Database', 'Portfolio'); # Database Name
define('Table', 'Client'); # Table Name
$conn = mysqli_connect(Host, User, Password, Database) or die(mysqli_connect_errno() . " : " . mysqli_connect_error()); # $conn send data to check
