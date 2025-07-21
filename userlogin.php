
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User login</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Handlee&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
 
   
      

    
</head>
<body>
<div>
                <div class="inner-layer">
                        <div class="container">
                          <div class="row no-margin">
                              <div class="col-sm-7">

                                  <div class="content">
                                      <h1>Book You Slot Now and Save your time</h1>
                                      <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis at lacus at rhoncus. Integer pharetra lacus vitae sapien blandit eleifend. </p>-->
                                      <p>India’s top doctors are available. we can connect with doctor, available 24/7, from the comfort of your home.</p>
                                      <h2>For Help Call : +919834001205</h2>
                                  </div>
                              </div>

                              <div class="col-sm-5">

                              <div class="form-data" >
                                      <div class="form-head">
                                          <h2>Patient Login</h2>

                                          <?php
                                             if(isset($_SESSION['msr'])){
                                                  ?>
                                                  <div class="alert alert-success">
                                                      <?php
                                                     echo $_SESSION['msr'];
                                                      unset($_SESSION['msr']);
                                                      ?>
                                                  </div>
                                                  <?php
                                              }
                                          ?>

                                          <?php
                                              if(isset($_SESSION['err'])){
                                                  ?>
                                                  <div class="alert alert-danger">
                                                      <?php
                                                      echo $_SESSION['err'];
                                                      unset($_SESSION['err']);
                                                      ?>
                                                  </div>
                                                  <?php
                                              }
                                          ?>


                                      
                              

                                    <?php require('navber.php'); ?>
                                      <div class="form-body">
                                          <form method="post" action="logincode.php" >
                                          
                                          <div class="row form-row">
                                            <input type="text" id="pat_email"  name="pat_email" placeholder="Enter Email Adreess " class="form-control">
                                          </div>
                                          
                                        <div class="row form-row">
                                            <input id="pat_pwd" type="password"  name="pat_pwd" placeholder="Enter The Password" class="form-control">
                                          </div>
                                          
                                              
                                          
                                          
                                          <div class="row form-row">
                                            <button type="submit" name="ok" value="register" class="btn btn-success btn-appointment">
                                              Login
                                            </button>
                                            
                                          </div>
                                          <div class="footer">
                                          <p class="text-dark">Don't have an account? <a href="userreg1.php">Register</a></p>
                                          </div>
                                  </form>
                                      </div>
                                  </div>
                              </div>
                            </div>

                            
                          </div>
                      
                        </div>
                        
              </div> 
          
                                            </div>      
                        <?php// require('footer.php'); ?> 
                        <br><br>
     
       

       


       

     
 
 


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
 

</body>
</html>
