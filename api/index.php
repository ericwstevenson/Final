<?php

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $text = trim(filter_input(INPUT_GET, 'text'));
        $author = trim(filter_input(INPUT_GET, 'author'));
        $category = trim(filter_input(INPUT_GET, 'category'));

        $data = array("text"=>$text, "author"=>$author, "category"=>$category);
        header('Content-Type: application/json');
        echo json_encode($data);
    } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!isset($_SERVER["CONTENT_TYPE"])) {
            $data = array("message"=>"Required: Content-Type header");
            header('Content-Type: application/json');
            echo json_encode($data);
        } else if ($_SERVER["CONTENT_TYPE"] == "application/json") {
            $json = file_get_contents('php://input');
            $data = json_decode($json);
            header('Content-Type: application/json');
            echo json_encode($data);
        } else {
            $text = trim(filter_input(INPUT_POST, 'text'));
            $author = trim(filter_input(INPUT_POST, 'author'));
            $category = trim(filter_input(INPUT_POST, 'category'));
            $data = array("text"=>$text, "author"=>$author, "category"=>$category);
            echo json_encode($data);
        }
    } else {
        $data = array("message"=>"You did not send a GET or POST request");
        header('Content-Type: application/json');
        echo json_encode($data);
    }

?>