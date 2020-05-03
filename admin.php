<?php
    session_start();
    require_once('util/valid_admin.php');
    require('model/database.php'); 
    require('model/quote_db.php');
    require('model/category_db.php');
    require('model/author_db.php');

    $action = filter_input(INPUT_POST, 'action') ?? filter_input(INPUT_GET, 'action') ?? 'list_quotes';

    switch ($action) {
        case 'list_quotes':
            $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
            $author_id = filter_input(INPUT_GET, 'author_id', FILTER_VALIDATE_INT);
            $sort = filter_input(INPUT_GET, 'sort');

            $sort = ($sort == "category") ? "category" : "author";

            $author_name = get_author_name($author_id);
            $category_name = get_category_name($category_id);

            $quotes = get_all_quotes($sort);
            if (!empty($category_id)) {
                $quotes = array_filter($quotes, function($array) use ($category_name) {
                    return $array["categoryName"] == $category_name;
                });
            }
            if (!empty($author_id)) {
                $quotes = array_filter($quotes, function($array) use ($author_name) {
                    return $array["authorName"] == $author_name;
                });
            }
            $categories = get_categories();
            $authors = get_authors();
            include('view/header-admin.php');
            include('admin_quote_list.php');
            include('view/footer.php');
            break;
        case 'list_categories':
            $categories = get_categories();
            include('view/header-admin.php');
            include('category_list.php');
            include('view/footer.php');
            break;
        case 'list_authors':
            $classes = get_authors();
            include('view/header-admin.php');
            include('author_list.php');
            include('view/footer.php');
            break;
        case 'delete_quote':
            $quote_id = filter_input(INPUT_POST, 'quote_id', FILTER_VALIDATE_INT);
            if (empty($quote_id)) {
                $error = "Missing or incorrect quote id.";
                include('view/header-admin.php');
                include('errors/error.php');
                include('view/footer.php');
            } else {
                delete_quote($quote_id);
                header("Location: admin.php"); 
            }
            break;
        case 'delete_category':
            $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
            if (empty($category_id)) {
                $error = "Missing or incorrect category id.";
                include('view/header-admin.php');
                include('errors/error.php');
                include('view/footer.php');
            } else {
                delete_category($category_id);
                header("Location: admin.php?action=list_categories");
            }
            break;
        case 'delete_author':
            $author_id = filter_input(INPUT_POST, 'author_id', FILTER_VALIDATE_INT);
            if (empty($author_id)) {
                $error = "Missing or incorrect author id.";
                include('view/header-admin.php');
                include('errors/error.php');
                include('view/footer.php');
            } else {
                delete_author($author_id);
                header("Location: admin.php?action=list_authors");
            }
            break;
        case 'show_add_form':
            $authors = get_authors();
            $categories = get_categories();
            include('view/header-admin.php');
            include('add_quote_form.php');
            include('view/footer.php');
            break;
        case 'add_quote':
            $text = filter_input(INPUT_POST, 'text', FILTER_VALIDATE_INT);
            $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
            $author_id = filter_input(INPUT_POST, 'author_id', FILTER_VALIDATE_INT);
            if (empty($text) || empty($category_id) || empty($author_id)) {
                $error = "Invalid vehicle data. Check all fields and try again.";
                include('view/header-admin.php');
                include('errors/error.php');
                include('view/footer.php');
            } else {
                add_quote($text, $category_id, $author_id);
                header("Location: admin.php");
            }
            break;
        case 'add_category':
            $category_name = filter_input(INPUT_POST, 'category_name');
            add_category($category_name);
            header("Location: admin.php?action=list_categories");
            break;
        case 'add_author':
            $author_name = filter_input(INPUT_POST, 'author_name');
            add_author($author_name);
            header("Location: admin.php?action=list_authors");
            break;
        case 'logout':
            $_SESSION = array();
            session_destroy();
            header("Location: admin-login.php");
    }
?> 

   