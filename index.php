<?php
    require('model/database.php');
    require('model/quote_db.php');
    require('model/category_db.php');
    require('model/author_db.php');

    $action = filter_input(INPUT_POST, 'action') ?? filter_input(INPUT_GET, 'action') ?? 'list_quotes';

    switch ($action) {
        default:
            $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
            $author_id = filter_input(INPUT_GET, 'author_id', FILTER_VALIDATE_INT);
            $sort = filter_input(INPUT_GET, 'sort');

            $sort = ($sort == "author") ? "author" : "category";

            $author_name = get_author_name($author_id);
            $category_name = get_category_name($category_id);

            $quotes = get_all_quotes($sort);
            if (!empty($category_id)) {
                $quotes = array_filter($quotes, function($array) use ($category_name) {
                    return $array["Category"] == $category_name;
                });
            }
            if (!empty($author_id)) {
                $quotes = array_filter($quotes, function($array) use ($author_name) {
                    return $array["Author"] == $author_name;
                });
            }

            $categories = get_categories();
            $authors = get_authors();
            include('view/header.php');
            include('quote_list.php');
            include('view/footer.php');
    }
?> 

   