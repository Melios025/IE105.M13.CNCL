<?php
 session_start();
 if(isset($_POST['submit'])&&($_POST['submit']=="Đăng ký"))
 {
     include"connect.php";
     $user=$_POST['username'];
     $pass=$_POST['password'];
     if(!isset($user) || trim($user) == '' || !isset($pass) || trim($pass) == '')
{
   echo "You did not fill out the required fields.";
}
else{


     $str="INSERT INTO USERNAME (UserName, PassWord) VALUES('$user','$pass')";
     $reset="ALTER TABLE UserName AUTO_INCREMENT =1";
     if($connect->query($str)==true){
        echo "Thêm thành công";
        $_SESSION['userLogin'] =$user;
        header("location:index.php");
        }
        else{
        echo "Thêm không thành công";
        }
    }
    $connect->query($reset);
     $connect->close();
 }

?>