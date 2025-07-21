<?php //require('config.php'); ?>

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
    


<div>     
<div>  
<?php require('navber.php'); ?> 
</div>
</div>
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

                
                  

                         

                <div>

           
                    <div class="form-data">
                        <?php
                    if(isset($_SESSION['msg'])){

                        ?>
                        <div class="alert alert-success">
                            <?php echo $_SESSION['msg']; ?>
                        </div>
                        
                        
                        <?php
                        unset($_SESSION['msg']);

                    }
                    if(isset($_SESSION['err'])){

                        ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['err']; ?>
                        </div>
                        
                        
                        <?php
                        unset($_SESSION['err']);

                    }


                ?>
                 
                        <div class="form-head">
                            <h2>Register</h2>
                        </div>
                        <div class="form-body">
                            <form method="post">
                            <div class="row form-row">
                            <!--<label for="pat_name">Enter name</label> &nbsp;&nbsp;&nbsp;&nbsp;<span id="invalid-name" class="text-danger"></span>-->
                              <input type="text" name="pat_name" placeholder="Enter Full name" class="form-control" >
                            </div>
                            <div class="row form-row">
                              <input type="text" name="pat_email" placeholder="Enter Email Adreess " class="form-control">
                            </div>
                             <div class="row form-row">
                              <input type="text"  name="pat_mob" placeholder="Enter Mobile Number" class="form-control">
                            </div>
                           <div class="row form-row">
                              <input id="dat" type="text"  name="pat_pwd" placeholder="Enter The Password" class="form-control">
                            </div>
                            <div class="row form-row">
                            <label for="pat_gender"  >Gender</label>
                            <select class="form-control " name="pat_gender" id="gender" >
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            </div>
                            <div class="row form-row">
                                <label for="pat_dob">Date of Birth</label >
                                <input type="date" name="pat_dob" class="form-control" id="dob" >
                                </div>
                                <div class="row form-row">
                                   
                                    <textarea class="form-control address " name="pat_address" id="address" placeholder="Enter Address" ></textarea>
                                    
                                    </div>
                            
                            
                             <div class="row form-row">
                               <button type="submit" name="ok" value="register" class="btn btn-success btn-appointment">
                                 Register
                               </button>
                               
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
      <br><br><br><br><br>

      <?php require('footer.php'); ?> 
      <br><br>

      
</div>
      
      <?php
            
                      if(isset($_POST['ok']))
                      {

                          $pat_name=$_POST['pat_name'];
                          $pat_email=$_POST['pat_email'];
                          $pat_pwd=$_POST['pat_pwd'];
                          $pat_mob=$_POST['pat_mob'];
                          $pat_gender=$_POST['pat_gender'];
                          
                          $pat_dob=$_POST['pat_dob'];
                          $pat_address=$_POST['pat_address'];
                          $src= "SELECT pat_email FROM patient WHERE pat_email='$pat_email'";
                          $rs=mysqli_query($con, $src) or die(mysqli_errno($con));
                          if(mysqli_num_rows($rs)>0){
                              
                                            
                                    ?>

                                    <script>
                                  /*  window.location='userlogin.php';*/
                                  </script>
                                  
                                                                
                                  <?php
                                  //$_SESSION['reg']=' You are Already Registered! Please login';
                                 

                                  /*<div class="alert alert-warning">
                                      You are Already Registered
                                  </div>*/
                              



                          }else{

                                      


                                    $vcode=rand(000000,999999);
                                  $sql= "  INSERT INTO patient ( pat_name, pat_email, pat_pwd, pat_dob, pat_gender, pat_mob, pat_address, vcode) VALUES ('$pat_name', '$pat_email', '$pat_pwd', '$pat_dob', '$pat_gender', '$pat_mob', '$pat_address', '$vcode') ";
                                  $res=mysqli_query($con, $sql) or die(mysqli_error($con));
                                  if($res==1){
                                   
                                    
                                        
                                        $subject = "Verify Your Email";
                                        $body = "Your Verification code is :-.$vcode";
                                        $headers = "From: Doctor Appointment Website";
                                        
                                        if (mail($pat_email, $subject, $body, $headers)) {
                                           
                                            
                                            ?>
                                            <script>

                                            window.location='userlogin.php';
                                          </script>
                                          
                                          
                                                                        
                                          <?php
                                      
                                             $_SESSION['msr']=' Registration is successfull... Please Log In';
                                                
                                                

                                        } else {
                                            
                                            ?>
                                            <script>
                                            window.location='userreg1.php';
                                          </script>
                                          
                                                                        
                                          <?php
                                    
                                            
                                           
                                          $_SESSION['err']=' Registration is unsuccessfull';
                                          

                                        }
                                        ?>


                                    

                                   
                                      
                                      


                                            <?php
                                  }else{
                                      
                                        ?>
                                      <script>
                                      window.location='userreg1.php';
                                    </script>
                                    
                                                                  
                                    <?php
                              
                                      
                                     
                                    $_SESSION['err']=' Registration is unsuccessfull';
                                    

                                   
                                      
                                      

                                      }

                          }

                      }
                      
                      
 ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script>
   /* $(document).ready(function(){
        $("#reg-frm").validate({
            rules: {
                pat_name: {
                    required: true,
                    lettersOnly: true
                },
                pat_email: {
                    required: true,
                    email: true
                },
                pat_mob: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                pat_pwd: {
                    required: true,
                    minlength: 6
                },
                pat_gender: {
                    required: true
                },
                pat_dob: {
                    required: true
                },
                pat_address: {
                    required: true
                }
            },
            messages: {
                pat_name: {
                    required: 'Please enter your name'
                },
                pat_email: {
                    required: 'Please enter your email-id',
                    email: 'Please enter a valid email address'
                },
                pat_mob: {
                    required: 'Please enter your mobile number',
                    digits: 'Please enter a valid 10-digit mobile number',
                    minlength: 'Mobile number must be 10 digits',
                    maxlength: 'Mobile number must be 10 digits'
                },
                pat_pwd: {
                    required: 'Please enter your password',
                    minlength: 'Password must be at least 6 characters'
                },
                pat_gender: {
                    required: 'Please select your gender'
                },
                pat_dob: {
                    required: 'Please enter your date of birth'
                },
                pat_address: {
                    required: 'Please enter your address'
                }
            }
        });

        $.validator.addMethod("lettersOnly", function(value, element) {
            return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
        }, "Please enter alphabets only.");
    });*/
</script>
<script>
$(document).ready(function(){
        $("#email_id").on("blur", function(){
            let email_id=$("#email_id").val();
            $.ajax({
                url: "checkEmail.php",
                method:"POST",
                data: {
                    email_id: email_id
                },
                success:function(resp) {
                    $("#msg").html(resp)
                }
            });
        });



        $.validator.addMethod("lettersOnly",function (value,element){
            return this.optional(element) || /^[a-zA-Z]+$/i.test(value);
            },"Please enter alphabets only.");

        $.validator.addMethod("phone",function (value,element){
        return this.optional(element) || /^\d{10}$/i.test(value);
        },"10 digit mobile number only.");

        jQuery.validator.setDefaults({
            errorPlacement: function(error, element) {
                error.appendTo('#invalid-' + element.attr('id'));
            }
        });

        $("#reg-frm").validate({
            rules:{
                pat_name:{
                    required:true,
                    lettersOnly:true
                },
                pat_email:{
                    required:true,
                    email:true
                },
                pat_pwd:{
                    required:true,
                    minlength:6
                },
                pat_dob:{
                    required:true
                },
                pat_gender:{
                    required:true
                },
                'lang[]':{
                    required:true,
                },
                pat_address:{
                    required:true
                },
                pat_city:{
                    required:true
                }
            },
            messages:{
                pat_name:{
                    required:'Please enter your name'
                },
                pat_email:{
                    required:'Please enter your email-id'
                },
                pat_pwd:{
                    required:'Please enter your password',
                    minlength:'Password at least 6 characters'
                }
            }
        })

    });
</script>

</body>
</html>