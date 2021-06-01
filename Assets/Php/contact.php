<?php

include_once('config.php'); # Adding configuration file

$_Name = $_POST['Name']; # Get Name from user input
$_Mail = $_POST['Mail']; # Get Mail content
$_Comment = $_POST['Comment'];

# Append to Json
$_File = file_get_contents('../Json/client.json'); # Load json file
$_Json = json_decode($_File, true); # Decode json file
$_Array = array( # Create an array
    'Name' => $_Name,
    'Mail' => $_Mail,
    'Comment' => $_Comment
);
$_Json[] = $_Array; # Add array to json
$_JSON = json_encode($_Json); # Encode json file
file_put_contents('../Json/client.json', $_JSON); # Overwrite json file

# Append to xml
$_XML = new DOMDocument(); # Create DOM Doc
$_XML->load('../Xml/client.xml'); # Load xml file
$client = $_XML->createElement('client'); # Create Tag 'client'
$Name = $_XML->createElement('name');
$Mail = $_XML->createElement('mail');
$Comment = $_XML->createElement('comment');
$client->appendChild($Name);
$client->appendChild($Mail);
$client->appendChild($Comment);
$name = $_XML->createTextNode($_Name);
$Name->appendChild($name);
$mail = $_XML->createTextNode($_Mail);
$Mail->appendChild($mail);
$comment = $_XML->createTextNode($_Comment);
$Comment->appendChild($comment);
$_XML->documentElement->appendChild($client); # Append client tag to DOM tag
$_XML->save('../Xml/client.xml'); # Save xml file

# Insert in Database
$query = "INSERT INTO " . Table . "(Name,Mail,Comment) VALUES('$_Name','$_Mail','$_Comment')"; # Inserting Name,Mail & Comment to database
$sql = mysqli_query($conn, $query);
!$sql ?: header('Location: ../../index.html?Message=Send'); # After insertion redirect to same page
