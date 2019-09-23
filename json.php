<?php
    header('Content-Type: application/json');
    $mysqli = new mysqli("localhost", "root", "", "guestbook");
    $query = "SELECT `id`, `username`, `email`, `text`, `date` FROM `users`";
    $result = $mysqli->query($query);
    if ($result = $mysqli->query($query)) {
        $to_json = array();
        while ($row = $result->fetch_assoc())
        {
            array_push($to_json,$row);

        }
    }
    $json = json_encode($to_json, JSON_PRETTY_PRINT);
    echo $json;
?>