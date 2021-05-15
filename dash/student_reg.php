<?php 
            include_once 'config/config.php';
            $slugname =  htmlspecialchars($_GET["slugname"]);
            //$result = mysqli_query($conn,"select id from college where slugname = '$slugname' ");
            $stmt = $conn->prepare("select id from college where slugname = ? ");
            $stmt->bind_param('s', $slugname);
            $stmt->execute();
            $result = $stmt->get_result();
            $value = $result->fetch_object();
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <title>Register Your Self!</title>
  </head>
  <body>
  <form class="form-signin" action="querycontrol.php" method="POST">
      <!-- <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
      <h1 class="h3 mb-3 font-weight-normal">Register Your Self!</h1>
      <label for="inputEmail" class="sr-only">FullName</label>
      <input type="text" id="inputEmail" class="form-control mb-2 rounded-0" name="fullname" placeholder="Enter Your Full Name" required autofocus>
      <label for="inputEmail" class="sr-only">Username</label>
      <input type="text" id="inputEmail" class="form-control mb-2 rounded-0" name="username" placeholder="Your username" required autofocus>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control mb-2 rounded-0" name="email" placeholder="Email address" required autofocus>
      <label for="inputEmail" class="sr-only">Select Gender</label>
      <select class="form-control mb-2 rounded-0" name="gender" required autofocus>
          <option value="">Select Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
      </select>
      <label for="inputEmail" class="sr-only">Phone No</label>
      <input type="text" id="inputEmail" class="form-control mb-2 rounded-0" name="phoneno" placeholder="Enter Your Phone Number" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control mb-2  rounded-0" name="password" placeholder="Password" required>
      <input type="hidden" value="<?php echo  $value->id ;?>" name="college_id" >
 
      <input class="btn btn-lg btn-primary btn-block rounded-0" type="submit" value="Sign in" name="StudentRegistration">
      <a href="login.php" class="btn btn-lg btn-danger btn-block rounded-0" type="submit">Login</a>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" ></script>


  </body>
</html>