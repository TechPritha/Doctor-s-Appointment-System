<?php
require("config.php");
//require("checksession.php");
$pat_email=$_POST['pat_email'];
$pat_pwd=$_POST['pat_pwd'];
$src="SELECT * FROM patient WHERE pat_email='$pat_email' AND pat_pwd='$pat_pwd'";
$rs=mysqli_query($con, $src);
if(mysqli_num_rows($rs)>0){
    $rec=mysqli_fetch_assoc($rs);
    if($rec['active']=='1'){
        $_SESSION['u_info']=$rec['pat_id']; // Storing the data into session
        header('location:home.php');
    }else{
        header('location:verify.php?pat_email='.$pat_email);
    }
}else{
    header('location:userlogin.php?err=Invalid email or password');
}

?>