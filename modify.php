<?php
    include "connect.php";
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $mabaiviet=$_POST['submit'];
        $str = "UPDATE CONTENT SET id=id,content=$content, IDcontent=IDcontent, Title=$title WHERE IDContent=$mabaiviet";
        $result = $connect->query($str);
        if ($result !== false && $result->num_rows > 0) {
            echo "sửa được";
        } else echo "sửa k được";
        $connect->close();
    }

    ?>