<?php
//require('config.php');
//require('checksession.php');
//checkSession(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<title>My Profile</title>
<style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .profile-header img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
        .profile-header h2 {
            margin-top: 10px;
        }
        .profile-header .initial-circle {
            width: 100px;
            height: 90px;
            border-radius: 50%;
            background-color: #4CAF50;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            font-weight: bold;
            margin: 0 auto;
        }
        .profile-info {
            margin-bottom: 20px;
        }
        .profile-info p {
            margin: 10px 0;
        }
        
        .btn-edit {
            display: inline-block;
            margin-right: 10px;
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            border: 1px solid transparent;
            border-radius: 5px;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .btn-edit:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-back {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            color: #4CAF50;
            background-color: #4CAF50;
            border: 1px solid #007bff;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        .btn-back:hover {
            background-color:  #4CAF50;
            color: #0056b3;
        }
    </style>
</head>





    </style>
</head>


<body class="sb-nav-fixed">
<?php require('navber.php'); ?>
<br><br><br>
       
           
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4"></h2>
                        <div class="container">
                        <?php
                            if(isset($_SESSION['update'])){
                                ?>
                                <div class="alert alert-success">
                                    <?php echo $_SESSION['update']; ?>
                                </div>
                                <?php
                                unset($_SESSION['update']);
                            }
                            if(isset($_SESSION['notupdate'])){
                                ?>
                                <div class="alert alert-danger">
                                    <?php echo $_SESSION['notupdate']; ?>
                                </div>
                                <?php
                                unset($_SESSION['notupdate']);
                            }
                         ?>
        
        
        
                            
                        <h1 class="text-center text-success bg-light allheading" >My Profile</h1>
                        
                                
                                <?php
                               
                               //session_start();
                              
                               
                              
                               $userId = $_SESSION['u_info'];
                               $src = "SELECT * FROM patient WHERE pat_id = ' $userId'";
                               $result = mysqli_query($con, $src);
                               
                               if (mysqli_num_rows($result) > 0) {
                                   $user_data = mysqli_fetch_assoc($result);
                              
                               ?>

                       
                                                
    <div class="profile-container">
                                                                                                    
        <h2 class="text-center text-danger bg-light "> Hi     <?php echo htmlspecialchars($user_data['pat_name']); ?></h2>
        <!--<div class="profile-header">
            <div class="initial-circle"><?php echo $first_letter;  ?></div>
        </div>-->
        <br>
        <div class="profile-info">
            <p><strong>Name:</strong> <?php echo htmlspecialchars($user_data['pat_name']); ?></p>
            <p><strong>Mobile:</strong> <?php echo htmlspecialchars($user_data['pat_mob']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user_data['pat_email']); ?></p>
            <p><strong>Gender:</strong> <?php echo htmlspecialchars($user_data['pat_gender']); ?></p>
            <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($user_data['pat_dob']); ?></p>
            <p><strong>Address:</strong> <?php echo htmlspecialchars($user_data['pat_address']); ?></p>
            <!-- Add more fields as needed -->
        </div>
        <a href="useredit.php" class="btn btn-success ">Edit Profile</a>
        <a href="home.php" class="btn btn-success ">Back</a>
    

    </div>
    <?php
} else {
    $_SESSION['err'] = "User not found!. Please login";
    header("Location: userlogin.php");
    
    
}
?>


                        

                </main>

                <?php require('footer.php'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>