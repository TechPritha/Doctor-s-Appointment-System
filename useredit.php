<?php //require('config.php'); 
 // require("checksession.php"); 

//fetch patient details by session for views all details in input section
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
<link rel="stylesheet" href="assets/css/.css">
<title>Edit</title>
</head>
<body>
<?php require('navber.php'); ?>
    <div class="container" text="center">
    
<div class="col-4">
    <?php
    $userId = $_SESSION['u_info'];
    $src = "SELECT * FROM patient WHERE pat_id = '$userId'";
    $result = mysqli_query($con, $src);
    $rec=mysqli_fetch_assoc($result);
    $pat_id = $userId;
  
  
     
  
  ?>
        <br><br><br>
    <h2 class="text-center text-danger bg-light text-bold allheading"> Edit Now</h2>
        
        <form name="ref-frm" id="reg-frm" method="post">
        
            <div class="form-group">
                <label for="pat_name"> Name</label>
                <input type="text" value="<?php echo $rec['pat_name'] ?>" name="pat_name" id="pat_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="pat_mob">Mobile No</label>
                <input type="text" value="<?php echo $rec['pat_mob'] ?>" name="pat_mob" id="pat_mob" class="form-control">
            </div>
            <div class="form-group">
                <label for="pat_email">Email ID</label>
                <input type="email" value="<?php echo $rec['pat_email'] ?>" name="pat_email" id="pat_email" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="pat_dob">Date of Birth</label>
                <input type="text" value="<?php echo $rec['pat_dob'] ?>" name="pat_dob" id="pat_dob" class="form-control">
            </div>
            <div class="form-group">
                <label for="pat_address">Address</label>
                <textarea rows="5"  name="pat_address" id="pat_address" class="form-control"><?php echo $rec['pat_address'] ?></textarea>
            </div>
            <input type="submit" name="ok" value="Save" class="btn btn-success">
        </form>
    </div>
</div>
<br><br><br>
<?php require('footer.php'); ?>
   <?php
        if(isset($_POST['ok'])){
            
            $pat_name=$_POST['pat_name'];
            $pat_mob=$_POST['pat_mob'];
            $pat_email=$_POST['pat_email'];
            $pat_dob=$_POST['pat_dob'];
            $pat_address=$_POST['pat_address'];
           
           
                
                $sql= "UPDATE patient SET  pat_name='$pat_name', pat_email='$pat_email', pat_mob='$pat_mob', pat_dob='$pat_dob', pat_address='$pat_address' WHERE pat_id=$pat_id";
                $res= mysqli_query($con, $sql) or die(mysqli_error($con));
                if($res==1){
                    
                    unset($_SESSION['pat_id']);
                    $_SESSION['update']=' Details Update Succesfully';
                       ?>
                            <script>
                         window.location='userprofile.php';
                        </script>
                 
                 //echo"delete succesfull";
                        <?php

                }
                      
                else{
                    unset($_SESSION['pat_id']);
                    $_SESSION['notupdate']=' Details not Update Succesfully';
                     ?>
                        <script>
                         window.location='userprofile.php';
                        </script>
                     <?php
                   //echo"delete succesfull"; 
                }
            }
        
        ?>
        



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>