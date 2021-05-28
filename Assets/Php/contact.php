<?php
# Post Creation in Database
include_once('config.php'); # Adding configuration file
$Name = $_POST['Name']; # Get Name from user input
$Mail = $_POST['Mail']; # Get Mail content
$Comment = $_POST['Comment'];
$query = "INSERT INTO " . Table . "(Name,Mail,Comment) VALUES('$Name','$Mail','$Comment')"; # Inserting Name,Mail & Comment to database
$sql = mysqli_query($conn, $query);
!$sql ?: header('Location: ../../index.html?Message=Send'); # After insertion redirect to same page
