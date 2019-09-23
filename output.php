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

<h1 class="text-center"> OUTPUT </h1>
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col"><a href="output.php?order=username">Username</a></th>
            <th scope="col"><a href="output.php?order=email">Email</a></th>
            <th scope="col"><a href="output.php?order=date">Date</a></th>
            <th scope="col">Text</th>

        </tr>
        </thead>
        <?php

        $mysqli = new mysqli("localhost", "root", "", "guestbook");
        if (isset($_GET['order'])){
                $order = $_GET['order'];
                $query = "SELECT `username`, `email`, `text`, `date` FROM `users` ORDER BY `users`.`".$order."`";
            }
        else
            {
                $query = "SELECT `id`, `username`, `email`, `text`, `date` FROM `users`";
            }

        //echo $query;
        $result = $mysqli->query($query);
        if ($result = $mysqli->query($query)) {
            $to_json = array();
            while ($row = $result->fetch_assoc())
            {
                array_push($to_json,$row);
                echo '
                        <tbody>
                            <tr>
                                <td>'. htmlspecialchars($row["username"]) .'</td>
                                <td>'. htmlspecialchars($row["email"]) .'</td>
                                <td>'. htmlspecialchars($row["date"]) .'</td>
                                <td>'. htmlspecialchars($row["text"]) .'</td>
                            </tr>
                        </tbody>
                        ';

            }
        }



        ?>
    </table>

<!--    JSON OUTPUT -->
    <a href="json.php"><input type="button" class="btn btn-primary" value="To JSON"></a><br>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
