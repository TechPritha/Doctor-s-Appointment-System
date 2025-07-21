<?php require('config.php'); 
  require('checksession.php');
  
  



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Appointment</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="feedappstyle.css" rel="stylesheet">
</head>
<body>
<?php
                //fetch doctors in select section
                          $src= "SELECT doc_id, doc_name,  speciality FROM doctors_list ";
                          $result=mysqli_query($con, $src) or die(mysqli_errno($con));
                          if(mysqli_num_rows($result)>0){
                              
                                            
                            $options = "";
                            while($row = $result->fetch_assoc()) {
                                $options .= "<option value='" . $row["doc_name"] . "'>" . $row["doc_name"] . " - " . $row["speciality"] .  "</option>";
                            }



                          }else{

                                      
                              $options = "<option value=''>No doctors available</option>";

                          
                                      }

                        ?>  

  <div class="container-fluid mt-5">
    <div class="row">
      
      <div class="col-md-6">
        <div class="container overlay">
          <h1 class="text-success">Book Appointment</h1>
          <form id="bookingForm"  method="post">
            
          <div class="form-group">
              <label for="doctor_name">Select Doctor</label>
              <select class="form-control" id="doctor_name" name="doctor_name" >
                <option value="" disabled selected>Select a doctor</option>
                <!--<?php //include 'get_doctors.php'; ?>-->
                <?php echo $options; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="date">Preferred Appointment Date</label>
              <input type="date" class="form-control" id="appointmentDate" name="date" required>
            </div>
           
            <div class="form-group">
              <label for="message">Message (Optional)</label>
              <textarea class="form-control" id="message" name="message" rows="3" placeholder="Enter any additional information or message"></textarea>
            </div>
            <button type="submit" name="ok" class="btn btn-success btn-block">Submit Appointment</button>
          </form>
        </div>
      </div>
    </div>
    <?php
            
                      if(isset($_POST['ok']))
                      {

                          $doctor_name=$_POST['doctor_name'];
                          $date=$_POST['date'];
                          $message=$_POST['message'];


                        /*  $userId = $_SESSION['u_info'];
                          $src = "SELECT * FROM appointment WHERE id = '$userId'";
                          $result = mysqli_query($con, $src);
                          $rec=mysqli_fetch_assoc($result);
                          $date = $userId;*/
                                                  
                          $src= "SELECT date FROM appointment WHERE id='$id'";
                          $rs=mysqli_query($con, $src) or die(mysqli_errno($con));
                          if(mysqli_num_rows($rs)>0){
                              
                                            
                                    ?>

                                    <script>
                                    window.location='userprofile.php';
                                  </script>
                                  
                                                                
                                  <?php
                                  $_SESSION['reg']=' You already have an appointment with same doctor.';
                                 

                                  /*<div class="alert alert-warning">
                                      You are Already Registered
                                  </div>*/
                              



                          }else{

                                      


                          
                                  $sql= "  INSERT INTO appointment ( doctor_name, date, message) VALUES ('$doctor_name', '$date', '$message') ";
                                  $res=mysqli_query($con, $sql) or die(mysqli_error($con));
                                  if($res==1)
                                  {  


                                    ?>

                                    <script>
                                    window.location='userprofile.php';
                                  </script>
                                  
                                                                
                                  <?php
                              
                                        $_SESSION['msg']=' Appointment booked successfully.';
                                        
                                        
                                      
                                      



                                  }else{
                                      ?>

                                      <script>
                                      window.location='userprofile.php';
                                    </script>
                                    
                                                                  
                                    <?php
                              
                                      
                                     
                                    $_SESSION['err']=' Error booking appointment. Please try again.';
                                    

                                     /*   <div class="alert alert-danger">
                                          Registration is unsuccessfull
                                      
                                      </div>
                                      <?php*/
                                      
                                      

                                      }

                          }

                      }
                      
                      
 ?>





  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

</body>
</html>