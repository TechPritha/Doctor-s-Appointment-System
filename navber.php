<?php require('config.php');
require('checksession.php');

/*$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$current_page= end($uri_segments);
$userId = $_SESSION['u_info'];
$src = "SELECT * FROM patient WHERE pat_id = ' $userId'";
$result = mysqli_query($con, $src);

if (mysqli_num_rows($result) > 0) {
    $user_data = mysqli_fetch_assoc($result);
}*/


    

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Doctor Appointment System</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

  <link href="style1.css" rel="stylesheet">
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">
      <img src="image/logo.png">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <?php
			if(empty($_SESSION['u_info']))	{
			?>



    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto ">
        <li class="nav-item ">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          
          <li class="nav-item ">
            <a class="nav-link" href="userlogin.php">Login/Register</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="home.php#doctor">Doctor</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="home.php#about">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="home.php#services">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="home.php#contact">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#feedback">Feedback</a>
        </li>
        
        
      </ul>
  </div>

      <?php
      
    
				}else{
				?>
           <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto ">

      <li class="nav-item ">
        <?php
      $userId = $_SESSION['u_info'];
$src = "SELECT * FROM patient WHERE pat_id = ' $userId'";
$result = mysqli_query($con, $src);

if (mysqli_num_rows($result) > 0) {
    $user_data = mysqli_fetch_assoc($result);
}


    

?>
          <a class="nav-link"   href="userprofile.php">
            <?php echo "Hi, " . $user_data['pat_name']; ?>
          </a>

               <!--   <li class="nav-item"   >
            <a class="nav-link" href="home.php">Home</a>
          </li>
          
        <li class="nav-item">
            <a class="nav-link" href="userreg1.php">Sign Up</a>
          </li>-->
          <li class="nav-item" >
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item">
          <a href="finddoc.php" class="nav-item nav-link">Find Doctor</a>
          </li>
         
        
        
        <!--<li class="nav-item">
          <a class="nav-link" href="userprofile.php">Profile</a>
        </li>-->
        

       
          
          <li class="nav-item">
          <a class="nav-link" href="userlogout.php">Log out</a>
        </li>

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          User Profile
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="userprofile.php">Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="appointmentlist.php">Appointments</a>
          <div class="dropdown-divider"></div>
         
          <a class="dropdown-item" href="userlogout.php">Logout</a>
        </div>
      </li>
        
      </ul>

      
    
      <?php
        }
				?>
  </div>

    
  </nav>
  


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="script.js"></script>
</body>
</html>

