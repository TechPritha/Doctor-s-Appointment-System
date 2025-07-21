<?php //require('config.php'); ?>
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
  <script>


        function openPopup() {
            alert("Thank you ! Your response has been submitted successfully.");
        }
    


   </script>
   

</head>
<body>

<?php require('navber.php'); ?>

  

  <!-- Jumbotron with Dynamic Background -->
  <div id="jumbotron" class="jumbotron" class="jumbotron jumbotron-fluid text-center">   
  <div class="jumbotron-bg" style="background-image: url('image/hero.jpg');"></div>                    
    <div class="container">
      <h1 class="display-4 text-bold">Book an Appointment</h1>
      <p class="lead text-bold">Easily book your appointment with our experienced doctors.</p>
      <hr class="my-4">
      <p>Click the button below to schedule your visit.</p>
      <a class="btn btn-primary btn-lg" href="finddoc.php" role="button">Book Appointment</a>
    </div>
  </div>

 

  

 





   <!-- Doctor Profile 
   <section id="doctor" class="container mt-5">
    <h2 class="text-center mb-4">Featured Doctors</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="doctor-profile text-center">
                <img src="image/doc1.jpg" alt="Doctor" class="img-fluid">
                <h3>Dr. John Doe</h3>
                <p>Cardiologist</p>
                <a class="btn btn-success btn-lg" href="bookappointment.php" role="button">Appointment</a> 
            </div>
        </div>
        <div class="col-md-3" >
            <div class="doctor-profile text-center">
                <img src="image/doc2.jpg" alt="Doctor" class="img-fluid">
                <h3>Dr. Jane Smith</h3>
                <p>Neurologist</p>
                <a class="btn btn-success btn-lg" href="bookappointment.php" role="button">Appointment</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="doctor-profile text-center">
                <img src="image/doc3.jpg" alt="Doctor" class="img-fluid">
                <h3>Dr. David Lee</h3>
                <p>Orthopedic Surgeon</p>
                <a class="btn btn-success btn-lg" href="bookappointment.php" role="button">Appointment </a>
               
            </div>
        </div>
        <div class="col-md-3">
            <div class="doctor-profile text-center">
                <img src="image/doc2.jpg" alt="Doctor" class="img-fluid">
                <h3>Dr. Emily Jones</h3>
                <p>Pediatrician</p>
                <a class="btn btn-success btn-lg" href="bookappointment.php" role="button">Appointment </a>
            </div>
        </div>
         Add more doctor profiles here 
    </div>
</section>-->

<!-- dynamic doctor -->
<section  id="doctor" class="container my-5">
<h2 class="text-center mb-4">Featured Doctors</h2>
      <?php require('doctorprofilehome.php');  ?>
</section>


 <!-- Services Section -->
 <section id="services" class="container my-5">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2>Our Services</h2>
        <p class="section-description">We offer a wide range of healthcare services to meet your needs.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 text-center service-item">
        <div class="service-icon">
          <i class="fas fa-stethoscope fa-3x"></i>
        </div>
        <h3>General Checkup</h3>
        <p>Regular health checkups to ensure you stay healthy.</p>
      </div>
      <div class="col-md-4 text-center service-item" id="border">
        <div class="service-icon">
          <i class="fas fa-heartbeat fa-3x"></i>
        </div>
        <h3>Cardiology</h3>
        <p>Expert cardiology services for heart health.</p>
      </div>
      <div class="col-md-4 text-center service-item" id="border">
        <div class="service-icon">
          <i class="fas fa-x-ray fa-3x"></i>
        </div>
        <h3>Radiology</h3>
        <p>Advanced imaging services for accurate diagnosis.</p>
      </div>
    </div>
  </section>

  







<!-- Contact Section -->
<section id="contact" class="container my-5" >
  <div class="row">
   

    <div class="col-md-12 text-center">
      <h2>Contact Us</h2>
      <p>Get in touch with us for more information or to schedule an appointment.</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <form id="contactForm" id="feedbackForm" method="post" action="contact.php" onsubmit="openPopup()">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
        </div>
        <div class="form-group">
          <label for="subject">Subject</label>
          <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea class="form-control" id="message" rows="3" name="message" placeholder="Your Message" required></textarea>
        </div>
        <button type="submit" name="ok" class="btn btn-primary btn-block">Send Message</button>
      </form>
      
    </div>
  </div>

  <div class="or-section text-center my-3">
        <br><br>
        <p><strong>OR</strong></p>
      </div>
      <div class="contact-details text-center container about-section">
      <br>
        <p><strong class="text-success">Phone :</strong>  &nbsp+919834001205</p>
       <p><strong class="text-success"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbspEmail :</strong> &nbsp support@doctorvisit.com</p>
      </div>
    </div>
  </div>

 
</section>

<!-- feedback Section -->
<section id="contact" class="container my-5">
  <div class="row">

  <div class="col-md-12 text-center">
<h2>Doctor Appointment Feedback</h2>
</div>
</div>

<div class="row">
    <div class="col-md-6 offset-md-3">

    <form id="feedbackForm" method="post"  action="feedback.php" onsubmit="openPopup()" >
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
      <button type="submit" name="ok" class="btn btn-primary btn-block"  >Submit Feedback</button>

    </form>

    </div>
    </div>
  </div>
  <br><br><br>

  <div class="container about-section">
    <h3>About</h3>
    <p>This feedback form is part of our doctor appointment system. We value your feedback and use it to improve our services. Thank you for taking the time to provide your input!</p>
  </div>
  
      



   

 </section>




<!-- About Us Section -->
<section id="about" class="container my-5">
  <div class="row">
  <div class="col-md-12">
  <h2>About Us</h2>
  <p>We are dedicated to providing the best healthcare services.</p>
  <p>
    Welcome to our  website, your one-stop destination for
    reliable and comprehensive health care information. We are committed
    to promoting wellness and providing valuable resources to empower you
    on your health journey.
  </p>
  <p>
    Explore our extensive collection of expertly written articles and
    guides covering a wide range of health topics. From understanding
    common medical conditions to tips for maintaining a healthy lifestyle,
    our content is designed to educate, inspire, and support you in making
    informed choices for your health.
  </p>
  <p>
    Discover practical health tips and lifestyle advice to optimize your
    physical and mental well-being. We believe that small changes can lead
    to significant improvements in your quality of life, and we're here to
    guide you on your path to a healthier and happier you.
  </p>
  </div>
  </div>
  </div>
  </section>

   <!-- Modal -->
   <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true"  >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel" >Information Submitted</h5>
                    <button type="button" class="close" data-dismiss="modal"  aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                Thanks for contacting us! Your response has been submitted successfully.
                </div>
                <div class="modal-footer" >
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
  

  <?php require('footer.php'); ?>
  

<!-- Include Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
 
</body>
</html>
