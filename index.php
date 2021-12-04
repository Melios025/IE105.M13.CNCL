<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Welcome!!!</title>
</head>

<body>
    <div class="container">
        Đăng nhập thành công !!! Chào mừng
        <?php
        if (isset($_SESSION['userLogin'])) {
            echo $_SESSION['userLogin'];
        } else header("location:dangnhap.php");
        ?>
        <a href="dangxuat.php" class="float-end">Đăng xuất</a>

        <form action="search.php" method="post">
            <input type="text" name="search">
            <input type="submit" name="searchBtn" value="Search">
        </form>
        <?
        if (isset($_SESSION['searchResult'])) {
            echo $_SESSION['searchResult'];
            unset($_SESSION['searchResult']);
        }
        ?>
        <div class="mx-auto text-center" style="width:50%">
            <h2>Bài viết của bạn</h2>
        </div>
        <form action="addContent.php" method="POST">
            <input class="btn btn-primary mb-3 px-3" type="submit" value="Thêm" name="submit">
        </form>
        <?php
        include "connect.php";
        if (isset($_SESSION['userLogin'])) {

            $str = "SELECT * FROM USERNAME WHERE UserName ='" . $_SESSION['userLogin'] . "'";
            $result = $connect->query($str);
            if ($result !== false && $result->num_rows > 0) {
                $row = $result->fetch_array();
                $userID = $row[0];
            }
        }
        $str = "SELECT * FROM CONTENT ORDER BY IDContent DESC";
        $result = $connect->query($str);
        
        if ($result !== false && $result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                $content = $row[1];
                echo "<div class='card mb-3 overflow-hidden' style='max-height: 150px;'>";
                echo "<div class='card-header'><a href='detailContent.php?mabaiviet=", $row[2], "'>", $row[3], "</a>";
                if($userID==$row[0]){
                echo"<a class='float-end' href='deleteContent.php?mabaiviet=", $row[2], "'>Xóa</a><a class='float-end mx-3' href='modifyContent.php?mabaiviet=", $row[2], "'>Sửa</a>";
            }
                echo"</div>";
                echo "<div class='card-body overflow-hidden'>", $content, "</div>";
                echo "</div>";
            }
        }
        ?>
        
    </div>
    <script>
        function showResult(str) {
            if (str.length == 0) {
                document.getElementById("livesearch").innerHTML = "";
                document.getElementById("livesearch").style.border = "0px";
                return;
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("livesearch").innerHTML = this.responseText;
                    document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
                }
            }
            xmlhttp.open("GET", "livesearch.php?q=" + str, true);
            xmlhttp.send();
        }
    </script>
   <a href="https://site.test/deleteContent.php?mabaiviet=16">Hiển thị</a>
</body>

</html>
