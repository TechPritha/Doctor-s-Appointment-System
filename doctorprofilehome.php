<?php
//require('config.php'); // Ensure this file contains your database connection details

//$src = "SELECT * FROM doctors_list";
$src = "SELECT s.*, d.* FROM doctors_list s INNER JOIN doctor_profile d ON s.doc_id = d.fid";
$rs = mysqli_query($con, $src) or die(mysqli_error($con));
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
<!--<link href="style1.css" rel="stylesheet">-->

<title>doctor profile</title>
<style>
    body {
  font-family: 'Montserrat', sans-serif;
  background-color: #f9f9f9;
}
.doctor-card {
  border: none;
  border-radius: 15px;
  transition: transform 0.3s, box-shadow 0.3s;
  box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  overflow: hidden;
  background: linear-gradient(145deg, #ffffff, #e6e6e6);
  margin-bottom: 30px;
  position: relative;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.doctor-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 8px 30px rgba(0,0,0,0.2);
}
.doctor-card img {
    width: 150px;
      height: 140px;
      border-radius: 50%;
      overflow: hidden;
      margin: 0 auto;

 /* width: 80%;
  height: 100px;
  object-fit: cover;
  
  border-radius: 50%; /* Add border-radius to make the image circular */
}
.doctor-card .card-body {
  text-align: center;
  padding: 20px;
}
.doctor-card .card-title {
  font-size: 1.5rem;
  font-weight: 700;
  margin-bottom: 10px;
  color: #333;
}
.doctor-card .card-text {
  font-size: 1rem;
  color: #757575;
  margin-bottom: 20px;
}
.doctor-card .btn-appointment {
  background-color: #4CAF50;
  color: #fff;
  padding: 10px 20px;
  border-radius: 5px;
  transition: background-color 0.3s;
  margin-top: auto;
}
.doctor-card .btn-appointment:hover {
  background-color: #45a049;
}
.doctor-card::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 8px;
  background: linear-gradient(90deg, #4CAF50, #8BC34A);
  border-top-left-radius: 15px;
  border-top-right-radius: 15px;
}
.card-container {
  display: flex;
  flex-wrap: wrap;
}
.card-item {
  flex: 1 1 calc(25% - 1rem); /* Four cards per row */
  margin: 0;
  
}
@media (max-width: 768px) {
  .card-item {
      flex: 1 1 calc(50% - 1rem); /* Two cards per row for medium screens */
  }
}
@media (max-width: 576px) {
  .card-item {
      flex: 1 1 calc(100% - 1rem); /* One card per row for small screens */
  }
}
.col-md-3 {
      margin-bottom: 40px; /* Adjust the value as needed */
    }


 </style>


      
</head>
<body>

        <!-- Doctor Cards Section -->
<div class="container mt-5">
    <div class="row">
        <?php
        if (mysqli_num_rows($rs) > 0) {
            while ($rec = mysqli_fetch_assoc($rs)) {
                ?>
                <br>
                <div class="col-md-3">
                
                    <div class="doctor-card" >
                        
                        <img src= "<?php echo htmlspecialchars($rec['fpath']); ?>" alt="Doctor Image">
                        <div class="card-body">
                            <h5 class="card-title"> <?php echo htmlspecialchars($rec['doc_name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($rec['speciality']); ?></p>
                           
                            
                            <a href="newappoin.php?doc_id=<?php echo htmlspecialchars($rec['doc_id']); ?>" class="btn btn-appointment">Appointment</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo '<h3>Sorry, no doctors found</h3>';
        }
        ?>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>