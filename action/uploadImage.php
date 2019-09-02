<?php
	session_start();
	include "../classes/User.php";
	$user = new User;
	$user->setUserLogged($_SESSION['id']);
	
	$file = $_FILES['file'];
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileType = $_FILES['file']['type'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];

	$format = explode('.', $fileName);
	$imgFormat = $format[1];
	$formatAllowed = array('png', 'jpg', 'jpeg');
	$image_path = '../profile_images/user'.$_SESSION['id'].'.'.$imgFormat;
	if($fileError == 0){
		if($fileSize < 2000000){
			if(in_array($imgFormat, $formatAllowed)){


				$user->setImgFormat($imgFormat);

				move_uploaded_file($fileTmpName, $image_path);

				header("Location: ../profile.php?upload=success");
			}
			else {
				header("Location: ../profile.php?upload=formatError");
			}
		}
		else{
			header("Location: ../profile.php?upload=sizeError");
		}

	}
	elseif($fileError == 4){
		header("Location: ../profile.php?upload=empty");
	}
	else {
		header("Location: ../profile.php?upload=error");
	}


	//How the query will look like - use this in the user class!
