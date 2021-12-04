<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit</title>
</head>

<body>

    <div class="container">
        <form action="add.php" method="POST">
            <div class="mb-3 mt-3">
                <label class="form-label" for="tit">Title: </label>
                <input class="form-control" type="text" name="title" id="tit">
            </div>
            <div class="mb-3">
                <label class="form-label" for="con">Content: </label>
                <textarea name="content" id="con" cols="173" rows="20"></textarea>
            </div>
            <input class="btn btn-primary mb-3 px-3" type="submit" value="Thêm" name="submit">
        </form>
    </div>

</body>

</html>