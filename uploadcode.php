<?php
require('config.php');
require('checkSession.php');
//$upload_by=$_SESSION['u_info']['name'];
//$about=$_POST['about'];
$fname=$_FILES['ff']['name'];
$destination='uploaded_files/'.rand(00000000,99999999)."_".$fname;
$source=$_FILES['ff']['tmp_name'];
// echo "<pre>";
// print_r($_FILES);
$fextarr=explode(".",$fname);
$fext=end($fextarr);
$ftype=array('png','PNG','JPEG','jpeg','jpg','JPG','webp','WEBP');
if(in_array($fext, $ftype)){
    if(move_uploaded_file($source, $destination)){
        $res=mysqli_query($con, "INSERT INTO doctor_profile ( fpath ) VALUES ( '$destination' )")or die(mysqli_error($con));
        if($res==1){
            $_SESSION['msg']='Upload successfull';
            ?>
           
            <?php
        }else{
            $_SESSION['err']='Please try again later';
            ?>
           
            <?php
        }
    }else{
        $_SESSION['err']='Not upload successfully';
        ?>
        
        <?php
    }
}else{
    $_SESSION['err']='Please select image file only';
    ?>
   
    <?php
}
?>