<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Đăng nhập</title>
</head>

<body>
    <div class="container mt-3">


        <form action="login.php" method="POST">
            <div class="mb-3 mt-3">
                <label class="form-label" for="user">Username: </label>
                <input class="form-control" type="text" name="username" id="user">
            </div>
            <div class="mb-3">
                <label class="form-label" for="pwd">Password: </label>
                <input class="form-control" type="password" name="password" id="pwd">
            </div>
            <input class="btn btn-primary mb-3 px-3" type="submit" value="Đăng nhập" name="submit">
        </form>
        <form action="dangky.php" method="post">
            <input class="btn btn-primary px-3 mb-3 " type="submit" value="Đăng ký">
        </form>
    
    
    <?php
    if (isset($_SESSION['err'])) {
        echo"<div class='alert alert-warning' >";
        echo $_SESSION['err'];
        echo"</div>";
    }
    unset($_SESSION['err']);
    ?>
 </div>   
</body>

</html>