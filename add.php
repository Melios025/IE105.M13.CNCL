<?php 
session_start();
include"connect.php";
if (isset($_SESSION['userLogin'])) {
    $str = "SELECT * FROM USERNAME WHERE UserName ='" . $_SESSION['userLogin'] . "'";
    $result = $connect->query($str);
    $reset="ALTER TABLE Content AUTO_INCREMENT =1";
    if ($result !== false && $result->num_rows > 0) {
        $row = $result->fetch_array();
        $userID = $row[0];
    }
    $title=$_POST['title'];
    $content=$_POST['content'];
$str="INSERT INTO CONTENT (ID, content, IDContent, Title) VALUES ('".$userID."', '".$content."', NULL, '".$title."')";
$result=$connect->query($str);
$result=$connect->query($reset);
$connect->close();
header("location:index.php");
}
?>