<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "test");
  

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$img = $_FILES['img']['name'];
  	// Get text
      $description = mysqli_real_escape_string($db, $_POST['description']);
      $title = mysqli_real_escape_string($db, $_POST['title']);

  	// image file directory
  	$target = "..//img/".basename($img);

  	$sql = "insert into user (img,description,title) VALUES ('$img','$description','$title')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
		  $msg = "Image uploaded successfully";
		  echo "$msg";
		  header("Location: ../pages/homepage.php");
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
$query = 'SELECT * FROM user';

// Get Result
$result = mysqli_query($db, $query);

// Fetch Data
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($users);
?>