<?php 
    function get_categories() {
        global $db;
        $query = 'SELECT * FROM categories ORDER BY Category_code';
        $statement = $db->prepare($query);
        $statement->execute();
        $categories = $statement->fetchAll();
        $statement->closeCursor();
        return $categories;
    }

    function get_category_name($category_id) {
        if ($category_id == NULL || $category_id == FALSE) {
            return NULL;
        }
        global $db;
        $query = 'SELECT * FROM types WHERE Category_code = :category_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $category = $statement->fetch();
        $statement->closeCursor();
        $category_name = $category['Category'];
        return $category_name;
    }

    function delete_category($category_id) {
        global $db;
        $query = 'DELETE FROM categories WHERE Category_code = :category_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_category($category_name) {
        global $db;
        $query = 'INSERT INTO categories (Code, Category)
              VALUES
                 (Code, :categoryName)';
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryName', $category_name);
        $statement->execute();
        $statement->closeCursor();
    }
?>