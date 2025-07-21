<?php
require_once('config.php');

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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="/css/style.css">
<title>contact</title>

</head>
<body>
<?php

if(isset($_POST['ok']))
    {

        
        $name=$_POST['name'];
        $email=$_POST['email'];
        $subject=$_POST['subject'];
        $message=$_POST['message'];
        
       
                    


        
                $sql= "  INSERT INTO contact ( name, email, subject, message) VALUES ('$name', '$email', '$subject','$message') ";
                
                $res=mysqli_query($con, $sql) or die(mysqli_error($con));
                if($res==1)
                {  
                   // $_SESSION['msg']=' submitted Succesfully';
                    ?>
                    
                            <script>
                                window.location='home.php';
                            </script>
                        
                    <?php



                }else{

                  //  $_SESSION['err']='Failed to Submitted ';
                    ?>
                    
                            <script>
                                window.location='home.php';
                            </script>
                        

                    <?php
                    

                    }

        }

    
    
    
    ?>
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>