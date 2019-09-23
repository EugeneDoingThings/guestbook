<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Guestbook</title>
</head>
<body>

<h1 class="text-center"> INPUT </h1>
<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="homepage">Homepage</label>
            <input class="form-control" type="url" name="homepage">
        </div>
        <div class="form-group">
            <label for="text">Text</label>
            <input class="form-control" type="textarea" name="text" required>
        </div>
        <div class="form-group">
            <input class="form-control" type="submit" name="submit" value="Отправить">
        </div>
    </form>

<?php
    $mysqli = new mysqli("localhost", "root", "", "guestbook");


    if (isset($_POST['submit']))
        {

            $query = "INSERT INTO users (ip_address, user_agent, username, email, homepage, text, date) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

            $stmt = $mysqli->prepare($query);
            $stmt->bind_param('sssssss', $_SERVER['REMOTE_ADDR'], $_SERVER["HTTP_USER_AGENT"], $_POST['username'],
                                        $_POST['email'], $_POST['homepage'], strip_tags($_POST['text']), date("m.d.y"));

            $stmt->execute();

            $stmt->close();
        }
//        else
//        {
//            echo '<h1>error</h1>';
//        }

?>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
