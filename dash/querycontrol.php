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
}else if (isset($_POST['createcollege'])){
    $collegename = $_POST['collegename'];
	$slugname = $_POST['slugname'];
	$tponame = $_POST['tponame'];
	$email = $_POST['email'];
	$address = $_POST['address'];

    $sql = "insert into college (collegename,slugname,tponame,email,address) values('$collegename','$slugname','$tponame','$email','$address')";
                    if (mysqli_query($conn, $sql)) {
            //echo "New record created successfully !";
    
            ///header("Location: ../thankyou.php");

            echo "<script>alert('College Create Successfully')
            window.location.href= 'regcollage.php'
            </script>";
               //header("Location: regcollage.php");
            
                     die("Redirecting to Welcome");
                    exit();
                 } else {
                    echo "Error: " . $sql . "
            " . mysqli_error($conn);
                 }
            // Close connection
            mysqli_close($conn);	
}else if (isset($_POST['getcollegeid'])){
    $collegeid = $_POST['getcollegeid'];


    $sql = "select id,collegename,slugname,tponame,email,address from college where id = '$collegeid'";

    $return_arr = array();

if ($result = mysqli_query( $conn, $sql )){
    while ($row = mysqli_fetch_assoc($result)) {
    $row_array['id'] = $row['id'];
	$row_array['collegename'] = $row['collegename'];
	$row_array['slugname'] = $row['slugname'];
	$row_array['tponame'] = $row['tponame'];
	$row_array['email'] = $row['email'];
    $row_array['address'] = $row['address'];

    array_push($return_arr,$row_array);
   }
 }
 

mysqli_close($conn);

echo json_encode($return_arr);
}else if (isset($_POST['StudentRegistration'])){

    $fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$phoneno = $_POST['phoneno'];
    $collage_id = $_POST['college_id'];
    $slugname = $_POST['slugname'];
   // $password = $_POST['password'];
    $password =  password_hash($_POST['password'], PASSWORD_DEFAULT); // Creates a password hash   
    

    $query = "select * from students where username = '$username' ";
    $result = mysqli_query($conn,$query);
    if ($result) {
      if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('username already exist')
      window.location.href='student_reg.php?slugname=$slugname';
        </script>";
      } else {
        //echo 'not found';
        $sql = "insert into students (username, fullname, email, gender, phoneno, password, college_id) values('$username','$fullname','$email','$gender','$phoneno','$password','$collage_id')";
                    if (mysqli_query($conn, $sql)) {
                            echo "<script>alert('Successfully Register')
                            window.location.href='./../login.php';
                            </script>";
                        
            //header("Location: ../index.php");
                     die("Redirecting to Welcome");
                    exit();
                 } else {
                    echo "<script>alert('Error Something went Wrong Your adding Dublicate value')
                    window.location.href='student_reg.php?slugname=$slugname';
                    </script>";
//echo "Error: " . $sql . "
        //    " . mysqli_error($conn);
                 }
            mysqli_close($conn);	
      }
    } else {
     // echo 'Error: '.mysql_error();
     echo "<script>alert('Error Something went Wrong Your adding Dublicate value')
     window.location.href='student_reg.php?slugname=$slugname';
     </script>";
    }

}else if (isset($_POST['addQuiz'])){
    $title = $_POST['title'];
	$no_of_questions = $_POST['no_of_questions'];
	$marks = $_POST['marks'];
	$time = $_POST['time'];

    $sql = "insert into quiz (title,marks,no_of_question,time) values('$title','$marks','$no_of_questions','$time')";
                    if (mysqli_query($conn, $sql)) {
            //echo "New record created successfully !";
    
            ///header("Location: ../thankyou.php");

            echo "<script>alert('Quiz Added Successfully')
            window.location.href= 'addquiz.php'
            </script>";
               //header("Location: regcollage.php");
            
                     die("Redirecting to Welcome");
                    exit();
                 } else {
                    echo "Error: " . $sql . "
            " . mysqli_error($conn);
                 }
            // Close connection
            mysqli_close($conn);	
}else if (isset($_POST['addQuestions'])){
    $question = $_POST['question'];
    $optiona = $_POST['optiona'];
    $optionb = $_POST['optionb'];
    $optionc = $_POST['optionc'];
    $optiond = $_POST['optiond'];
    $correctans = $_POST['correctans'];

    foreach( $question as $key => $n ) {
        echo "The Question is ".$n.", OPA is ".$optiona[$key];

              echo $optionb[$key];
              echo $optionc[$key];
              echo $optiond[$key];
              echo $correctans[$key];
              $sql = "insert into questions (title,marks,no_of_question,time) values('$title','$marks','$no_of_questions','$time')";

              mysqli_query($conn, $sql)
      }
    
}
?>