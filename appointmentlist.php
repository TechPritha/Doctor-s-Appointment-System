
<?php
//require("config.php");
//require("checkSession.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Appointment- Pofile</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .status-Rejected {
            color: red;
            font-weight: bold;
        }
        .status-Approved {
            color:  #28a745;
            font-weight: bold;
        }
        .status-Pending {
            color: rgb(160, 160, 13);
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php require('navber.php') ?>
    <br><br><br><br>

    <!-- Search Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h2 class="d-inline-block text-warning text-uppercase border-bottom border-5">Booked Appointment</h2>
            </div>
        </div>
    </div>
    <!-- Search End -->


    <!-- Search Result Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <?php
             $userId = $_SESSION['u_info'];
             $src = "SELECT * FROM patient WHERE pat_id = ' $userId'";
             $result = mysqli_query($con, $src);
             
             if (mysqli_num_rows($result) > 0) {
                 $user_data = mysqli_fetch_assoc($result);
             }
            
            
             $src = "SELECT a.app_id, a.app_date, a.app_made, a.time_slot, a.status, d.doc_name, d.speciality
             FROM appointment a
             INNER JOIN doctors_list d ON a.doc_id = d.doc_id
             WHERE  a.pat_id = '$userId'";

            $rs=mysqli_query($con, $src);
            if(mysqli_num_rows($rs)>0){
                ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>Serial No</th>
                            <th>Name of Doctor</th>
                           
                            <th>Specialization</th>
                           
                            <th>Appointment on</th>
                            <th>Timings</th>
                            <th>Appointment Made</th>
                            <th>Status</th>
                            <th>Action</th> <!-- Add a column for action -->
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        while($rec=mysqli_fetch_assoc($rs)){
                            ?>
                            <tr>
                            <td><?php echo $rec['app_id'] ?></td>
                                <td><?php echo $rec['doc_name'] ?></td>
                             
                                <td><?php echo $rec['speciality'] ?></td>
                               
                                <td><?php echo $rec['app_date'] ?></td>
                                <td><?php echo $rec['time_slot'] ?></td>
                                <td><?php echo $rec['app_made'] ?></td>
                                <td class="<?php echo $rec['status'] == 'Rejected' ? 'status-Rejected' : '';  echo $rec['status'] == 'Approved' ? 'status-Approved' : ''; echo $rec['status'] == 'Pending' ? 'status-Pending' : '';?>">
                                
                                    <?php echo ucfirst($rec['status']); ?>

                                    <td>
                                    <?php if ($rec['status'] == 'Approved') { ?>
                                        <!-- Cancel Button/Link -->
                                        <form method="post" action="cancel_appointment.php">
                                            <input type="hidden" name="app_id" value="<?php echo $rec['app_id']; ?>">
                                            <button type="submit" class="btn btn-danger">Cancel</button>
                                        </form>
                                    <?php } else { ?>
                                        <!-- Disabled Cancel Button for Non-Approved Appointments -->
                                        <button type="button" class="btn btn-danger " disabled>Cancel</button>
                                    <?php } ?>
                                </td>

                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php

            }else{
                ?>
                <h3 class="text-center">Sorry, no appointments found.</h3>
                <?php
            }
            ?>
        </div>
    </div>
    <!-- Search Result End -->

<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <!-- Footer Start -->
    <?php
    require('footer.php');
    ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <!--<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>-->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>