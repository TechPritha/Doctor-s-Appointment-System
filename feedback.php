<?php
require_once('config.php');
//require_once('checksession.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Appointment Feedback</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <!--<link href="feedappstyle.css" rel="stylesheet">
  
  <script>
        function openPopup() {
            alert("Thank you for your feedback! Your response has been submitted successfully.");
        }
    </script>-->
  
  
</head>
<body>

<div>
<?php //require('navber.php'); ?>
<div>


<!--<main>

  <div class="container">
 
    <h2>Doctor Appointment Feedback</h2>
    <form id="feedbackForm" method="post" onsubmit="openPopup()" >
      <div class="form-group">
        <label for="fd_name">Your Name:</label>
        <input type="text" class="form-control" id="fd_name" name="fd_name" required>
      </div>
      <div class="form-group">
        <label for="fd_email">Your Email:</label>
        <input type="email" class="form-control" id="fd_email" name="fd_email" required>
      </div>
      <div class="form-group">
        <label for="feedback">Feedback:</label>
        <textarea class="form-control" id="feedback" name="feedback" required></textarea>
      </div>
      <button type="submit" name="ok" class="btn btn-primary"  >Submit Feedback</button>

    </form>
    
  </div>

  <div class="container about-section">
    <h3>About</h3>
    <p>This feedback form is part of our doctor appointment system. We value your feedback and use it to improve our services. Thank you for taking the time to provide your input!</p>
  </div>
  
      



   </main>
  </div>
                                  </div>
<footer>
   <?php// require('footer.php'); ?>
</footer>
                                  </div>-->
  
  
  <?php

if(isset($_POST['ok']))
    {

        
        $fd_name=$_POST['fd_name'];
        $fd_email=$_POST['fd_email'];
        $feedback=$_POST['feedback'];
        
       
                    


        
                $sql= "  INSERT INTO feedback ( fd_name, fd_email, feedback) VALUES ('$fd_name', '$fd_email', '$feedback') ";
                
                $res=mysqli_query($con, $sql) or die(mysqli_error($con));
                if($res==1)
                {  
                   
                   ?>
                    
                   <script>
                       window.location='home.php';
                   </script>
               
           <?php



                }else{

                 
                    ?>
                    
                            <script>
                                window.location='home.php';
                            </script>
                        

                    <?php
                    

                    }

        }

    
    
    
    ?>
   
  

  <!-- Bootstrap JS and jQuery (optional, for Bootstrap components) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
