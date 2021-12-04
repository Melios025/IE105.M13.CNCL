<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>


<body>
    <div class="container mt-3">
        <?php
        include "connect.php";
        $mabaiviet = $_GET['mabaiviet'];
        $_SESSION['mabaiviet'] = $mabaiviet;
        $str = "SELECT * FROM CONTENT WHERE IDContent=$mabaiviet";
        $result = $connect->query($str);
        if ($result !== false && $result->num_rows > 0) {
            $row = $result->fetch_array();
            echo "<h2>", $row[3], "</h2>";
            echo $row[1];
            $connect->close();
        }
        ?>
        <div class="commentDisplay">

        </div>
        <form action="comment.php" method="post">
            <div class="mb-3">
                <input class="form-control" type="text" name="comment" id="comment">
            </div>
            <input type="submit" name="commentSubmit" value="Comment">
        </form>
    </div>
    <div class="container mt-3">
        <?php
        include "connect.php";
        $mabaiviet = $_GET['mabaiviet'];
        $sql = "SELECT * FROM COMMENT WHERE IDContent=$mabaiviet";
        $result = $connect->query($sql);

        if ($result !== false && $result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                echo "<div class='card mb-3 overflow-hidden' style='max-height: 150px;'>";
                echo "<div class='card-body overflow-hidden'>";
                echo $row[1];
                echo "</div>";
                echo "</div>";
            }
        }
        $connect->close();
        ?>
    </div>
    
</body>

</html>