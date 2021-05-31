<?php
# Insert in Database
include_once('config.php'); # Adding configuration file
$Name = $_POST['Name']; # Get Name from user input
$Mail = $_POST['Mail']; # Get Mail content
$Comment = $_POST['Comment'];
$query = "INSERT INTO " . Table . "(Name,Mail,Comment) VALUES('$Name','$Mail','$Comment')"; # Inserting Name,Mail & Comment to database
$sql = mysqli_query($conn, $query);
# Append to Json
$_File = file_get_contents('../../client.json');
$_Json = json_decode($_File,true);
$_Array = array(
    'Name' => $Name,
    'Mail' => $Mail,
    'Comment' => $Comment
);
$_Json[] = $_Array;
$_JSON = json_encode($_Json);
file_put_contents('../../client.json',$_JSON);
!$sql ?: header('Location: ../../index.html?Message=Send'); # After insertion redirect to same page
