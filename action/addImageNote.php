<?php 
	$file = $_FILES['image'];
	$file_name = $file['name'];
	$file_size = $file['size'];
	$file_tmp_name = $file['tmp_name'];
	$file_type = $file['type'];
	$file_error = $file['error'];

	echo $fileName;