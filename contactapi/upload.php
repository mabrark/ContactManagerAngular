<?php
session_start();

header('Content-type: application/json');
ini_set('disply_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_All);

require 'contact.php';

//Handle image upload
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK)
{
  $uploadDir = 'upload/';
  $originalFileName = basename($_FILES['image']['name']);

  //Generate a new file name with "main"
  $newFileName = $originalFileName;
  $targetFilePath = $uploadDir . $newFileName;

  // Save the new image to the upload directory
  if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath))
  {
    // no code required
  }
  else 
  {
    http_response_code(500);
    echo json_encode(['message' => 'Failed to upload image']);
  }

  exit;   //exit after handling image

}
?>