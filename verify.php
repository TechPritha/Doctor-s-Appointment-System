<?php
require("config.php");
$pat_email=$_GET['pat_email'];
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
<title>Email Verification Form</title>
<style>
   body {
            background-color: #f7f7f7;
            font-family: 'Arial', sans-serif;
        }
        .verification-container {
            margin-top: 50px;
            padding: 40px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 900px; /* Slightly increased width */
            min-height: 750px; /* Slightly increased height */
            margin-left: auto;
            margin-right: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }
        .verification-header {
            padding: 15px 20px;
            background: linear-gradient(90deg, #4CAF50, #66BB6A);
            color: #fff;
            border-radius: 10px 10px 0 0;
            text-align: center;
            font-size: 1.5em;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: absolute;
            top: -30px;
            left: 50%;
            transform: translateX(-50%);
            width: calc(100% - 40px);
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            font-weight: bold;
            color: #333;
        }
        .form-contro {
            width: 100%; /* Full width */
    height: 50px; /* Increased height */
    border: 2px solid #4CAF50;
    border-radius: 5px;
    transition: all 0.3s ease-in-out;
    font-size: 1.2em; /* Increased font size */
    padding: 10px; /* Added padding */
        }
        .form-contro:focus {
            border-color: #66BB6A;
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.2);
        }
       /* .btn-outline-success {
            border-width: 2px;
            background: linear-gradient(90deg, #4CAF50, #388E3C);
            color: #fff;
            border: none;
            transition: background 0.3s ease, transform 0.3s ease;
            font-size: 1.2em;
            padding: 10px;
        }
        .btn-outline-success:hover {
            background: linear-gradient(90deg, #388E3C, #2E7D32);
            transform: scale(1.05);
        }*/
    </style>
</head>
<body>
<?php// require('navber.php'); ?> 
<br>
<div class="container verification-container">
        <div class="col-md-6 offset-md-3">
            <h1 class="text-warning bg-light text-center verification-header">Verify Your Email</h1>
            <br><br><br>
            <form name="v-email" method="post">
                <div class="form-group">
                    <label for="vcode">Enter Verification Code : &nbsp&nbsp&nbsp</label>
                    
                    <input type="text" name="vcode" class="form-contro" id="vcode">
                </div>
                <br><br>
                <input type="submit" name="ok" value="Submit" class="btn btn-outline-success btn-block">
            </form>
        </div>
    </div>
            <?php
            if(isset($_POST['ok'])){
                $vcode=$_POST['vcode'];
                $rs=mysqli_query($con, "SELECT vcode FROM patient WHERE pat_email='$pat_email'")or die(mysqli_error($con));
                $rec=mysqli_fetch_assoc($rs);
                print_r($rec);
                if($rec['vcode']==$vcode){
                    $upd=mysqli_query($con,"UPDATE patient SET active='1' WHERE pat_email='$pat_email'")or die(mysqli_errno($con));
                    if($upd==1){
                        header('location:userlogin.php?msg=Verification complete!');
                    }else{
                        ?>
                        <div class="alert alert-danger">
                           Please try again later
                        </div>
                    <?php
                    }
                }else{
                    ?>
                    <div class="alert alert-danger">
                        Invalid verification code
                    </div>
                    <?php
                }
            }
            ?>
            <?php
            if(isset($_GET['msg'])){
                ?>
                <div class="alert alert-danger">
                    Your registration is successfull and verify your email
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <br>
    <br>
    <br>

    <?php //require('footer.php'); ?> 

  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>