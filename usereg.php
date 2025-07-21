<?php
require('config.php');
session_start();
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
<link rel="stylesheet" href="assets/css/style.css">
<title>Registration</title>
</head>
<body>
<div class="inner-layer">
    <div class="container">
        <div class="row no-margin">
            <div class="col-sm-7">
                <div class="content">
                    <h1>Book Your Slot Now and Save Your Time</h1>
                    <p>India’s top doctors are available. We can connect with doctors, available 24/7, from the comfort of your home.</p>
                    <h2>For Help Call: +919834001205</h2>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-data">
                    <?php if(isset($_SESSION['msg'])) { ?>
                        <div class="alert alert-success">
                            <?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?>
                        </div>
                    <?php } if(isset($_SESSION['err'])) { ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['err']; unset($_SESSION['err']); ?>
                        </div>
                    <?php } ?>
                    <div class="form-head">
                        <h2>Sign Up</h2>
                    </div>
                    <div class="form-body">
                        <form id="registrationForm" method="post" action="">
                            <div class="row form-row">
                                <label for="pat_name">Enter Name</label>
                                <input type="text" name="pat_name" placeholder="Enter Full Name" class="form-control" >
                                <span id="invalid-name" class="text-danger"></span>
                            </div>
                            <div class="row form-row">
                                <input type="email" name="pat_email" placeholder="Enter Email Address" class="form-control" >
                            </div>
                            <div class="row form-row">
                                <input type="text" name="pat_mob" placeholder="Enter Mobile Number" class="form-control" >
                            </div>
                            <div class="row form-row">
                                <input type="password" name="pat_pwd" placeholder="Enter The Password" class="form-control" >
                            </div>
                            <div class="row form-row">
                                <label for="pat_gender">Gender</label>
                                <select class="form-control" name="pat_gender" id="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="row form-row">
                                <label for="pat_dob">Date of Birth</label>
                                <input type="date" name="pat_dob" class="form-control" id="dob" >
                            </div>
                            <div class="row form-row">
                                <textarea class="form-control" name="pat_address" id="address" placeholder="Enter Address" ></textarea>
                            </div>
                            <div class="row form-row">
                                <button type="submit" name="ok" value="register" class="btn btn-success btn-appointment">Sign Up</button>
                            </div>
                            <div class="footer">
                                <p class="text-dark">Already have an account? <a href="userlogin.php">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_POST['ok'])) {
    $pat_name = $_POST['pat_name'];
    $pat_email = $_POST['pat_email'];
    $pat_pwd = password_hash($_POST['pat_pwd'], PASSWORD_BCRYPT); // Hash the password
    $pat_mob = $_POST['pat_mob'];
    $pat_gender = $_POST['pat_gender'];
    $pat_dob = $_POST['pat_dob'];
    $pat_address = $_POST['pat_address'];

    $src = "SELECT pat_email FROM patient WHERE pat_email='$pat_email'";
    $rs = mysqli_query($con, $src);
    if(mysqli_num_rows($rs) > 0) {
        $_SESSION['err'] = 'You are already registered! Please login';
        echo "<script>window.location='userlogin.php';</script>";
    } else {
        $vcode = rand(000000, 999999);
        $sql = "INSERT INTO patient (pat_name, pat_email, pat_pwd, pat_dob, pat_gender, pat_mob, pat_address, vcode) VALUES ('$pat_name', '$pat_email', '$pat_pwd', '$pat_dob', '$pat_gender', '$pat_mob', '$pat_address', '$vcode')";
        $res = mysqli_query($con, $sql);
        if($res) {
            $subject = "Verify Your Email";
            $body = "Your verification code is: $vcode";
            $headers = "From: Doctor Appointment Website";

            if(mail($pat_email, $subject, $body, $headers)) {
                $_SESSION['msg'] = 'Registration is successful. Please check your email for verification.';
                echo "<script>window.location='userlogin.php';</script>";
            } else {
                $_SESSION['err'] = 'Registration unsuccessful. Please try again.';
                echo "<script>window.location='userreg1.php';</script>";
            }
        } else {
            $_SESSION['err'] = 'Registration unsuccessful. Please try again.';
            echo "<script>window.location='userreg1.php';</script>";
        }
    }
}
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('#registrationForm').submit(function(event) {
        var isValid = true;

        var name = $('input[name="pat_name"]').val().trim();
        if(name.length === 0) {
            $('#invalid-name').text('Name is required');
            isValid = false;
        } else {
            $('#invalid-name').text('');
        }

        if(!isValid) {
            event.preventDefault();
        }
    });
});
</script>
</body>
</html>
