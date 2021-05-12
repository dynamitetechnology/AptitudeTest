<?php
require_once "config/config.php";

//Random String Generator
function generateRandomString($length = 15) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$upload_directory = "uploads/";

if(isset($_POST['addregistrationandlicence']) ){
	
$title = $_POST['title'];
$shortdesc = $_POST['shortdesc'];
$description = $_POST['description'];
$categoryname = $_POST['categoryname'];

// Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
		
		$originalfile = generateRandomString() . $filename;
	
	
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists($upload_directory  . $originalfile)){
                echo $filename . " is already exists.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], $upload_directory . $originalfile);
				
				$ogfilepath = $upload_directory . $originalfile;
				
                //echo "Your file was uploaded successfully.",$filename;
			$sql = "insert into posts (title, shortdesc, description, filepath, categoryname) VALUES ('$title', '$shortdesc','$description','$ogfilepath','$categoryname')";
				if (mysqli_query($conn, $sql)) {
		//echo "New record created successfully !";

		header("Location: registrationlicenses.php"); 
				 die("Redirecting to Welcome");
				exit();
			 } else {
				echo "Error: " . $sql . "
		" . mysqli_error($conn);
			 }
		// Close connection
		mysqli_close($conn);	
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }

} else if (isset($_POST['uploadimageregistrationandlicence'])){
//update property List Data
$hiddenid = $_POST['hiddenid'];

// Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
		
		$originalfile = generateRandomString() . $filename;
	
	
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists($upload_directory  . $originalfile)){
                echo $filename . " is already exists.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], $upload_directory . $originalfile);
				
				$ogfilepath = $upload_directory . $originalfile;

			$sql = "update posts  set filepath = '$ogfilepath' where id = '$hiddenid'";
            if (mysqli_query($conn, $sql)) {
		//echo "New record created successfully !";

		header("Location: registrationlicenseslist.php"); 
				 die("Redirecting to Welcome");
				exit();
			 } else {
				echo "Error: " . $sql . "
		" . mysqli_error($conn);
			 }
		// Close connection
		mysqli_close($conn);	
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
	
}else if (isset($_POST['updateregistrationandlicence'])){
	
    $title = $_POST['title'];
    $shortdesc = $_POST['shortdesc'];
    $description = $_POST['description'];
    $hiddenid = $_POST['hiddenid'];
	$categoryname = $_POST['categoryname'];
	
    $sql = "update posts  set title = '$title', shortdesc = '$shortdesc', description = '$description', categoryname = '$categoryname' where id = '$hiddenid'";
	
				if (mysqli_query($conn, $sql)) {
		//echo "New record created successfully !";

		header("Location: registrationlicenseslist.php");
		
				 die("Redirecting to Welcome");
				exit();
			 } else {
				echo "Error: " . $sql . "
		" . mysqli_error($conn);
			 }
		// Close connection
		mysqli_close($conn);	
}else if(isset($_POST['createblog']) ){
	
$title = $_POST['title'];
$shortdesc = $_POST['shortdesc'];
$description = $_POST['description'];

// Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
		
		$originalfile = generateRandomString() . $filename;
	
	
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists($upload_directory  . $originalfile)){
                echo $filename . " is already exists.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], $upload_directory . $originalfile);
				
				$ogfilepath = $upload_directory . $originalfile;
				
                //echo "Your file was uploaded successfully.",$filename;
			$sql = "insert into blog (title, shortdesc, description, filepath) VALUES ('$title', '$shortdesc','$description','$ogfilepath')";
				if (mysqli_query($conn, $sql)) {
		//echo "New record created successfully !";

		header("Location: bloglist.php"); 
				 die("Redirecting to Welcome");
				exit();
			 } else {
				echo "Error: " . $sql . "
		" . mysqli_error($conn);
			 }
		// Close connection
		mysqli_close($conn);	
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }

}else if (isset($_POST['updateblogdata'])){
	
    $title = $_POST['title'];
    $shortdesc = $_POST['shortdesc'];
    $description = $_POST['description'];
    $hiddenid = $_POST['hiddenid'];
    $sql = "update blog  set title = '$title', shortdesc = '$shortdesc', description = '$description' where id = '$hiddenid'";
	
				if (mysqli_query($conn, $sql)) {
		//echo "New record created successfully !";

		header("Location: bloglist.php");
		
				 die("Redirecting to Welcome");
				exit();
			 } else {
				echo "Error: " . $sql . "
		" . mysqli_error($conn);
			 }
		// Close connection
		mysqli_close($conn);	
}else if (isset($_POST['uploadblogimage'])){
//update property List Data
$hiddenid = $_POST['hiddenid'];

// Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
		
		$originalfile = generateRandomString() . $filename;
	
	
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists($upload_directory  . $originalfile)){
                echo $filename . " is already exists.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], $upload_directory . $originalfile);
				
				$ogfilepath = $upload_directory . $originalfile;

			$sql = "update blog  set filepath = '$ogfilepath' where id = '$hiddenid'";
            if (mysqli_query($conn, $sql)) {
		//echo "New record created successfully !";

		header("Location: bloglist.php"); 
				 die("Redirecting to Welcome");
				exit();
			 } else {
				echo "Error: " . $sql . "
		" . mysqli_error($conn);
			 }
		// Close connection
		mysqli_close($conn);	
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
	
}else if (isset($_POST['addcategories'])){
    $name = $_POST['title'];

    $sql = "insert into  categories (name) values('$name')";
                    if (mysqli_query($conn, $sql)) {
            //echo "New record created successfully !";
    
            header("Location: addcategory.php");
            
                     die("Redirecting to Welcome");
                    exit();
                 } else {
                    echo "Error: " . $sql . "
            " . mysqli_error($conn);
                 }
            // Close connection
            mysqli_close($conn);	
}else if (isset($_POST['contactsection'])){
    $first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];

    $sql = "insert into  usercontacts (first_name, last_name, email, phone, message) values('$first_name', '$last_name', '$email','$phone','$message')";
                    if (mysqli_query($conn, $sql)) {
            //echo "New record created successfully !";
    
            header("Location: ../thankyou.php");
            
                     die("Redirecting to Welcome");
                    exit();
                 } else {
                    echo "Error: " . $sql . "
            " . mysqli_error($conn);
                 }
            // Close connection
            mysqli_close($conn);	
}
    

?>