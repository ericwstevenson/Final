<?php 
    function get_all_quotes($sort) {
        global $db;
        if ($sort == 'category'){
            $orderby = 'Q.Category';
        } else {
            $orderby = 'Q.Author';
        }
        $query = 'SELECT Q.Text, Q.Author, Q.Category 
            FROM quotes Q
            LEFT JOIN authors A ON Q.Author_code = A.Code 
            LEFT JOIN categories C ON Q.Category_code = C.Code 
            ORDER BY ' . $orderby . ' DESC';
        $statement = $db->prepare($query);
        $statement->execute();
        $quotes = $statement->fetchAll();
        $statement->closeCursor();
        return $quotes;
    }

    function get_quote($quote_id) {
        global $db;
        $query = 'SELECT * FROM quotes WHERE IndexNum = :quote_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':quote_id', $quote_id);
        $statement->execute();
        $quote = $statement->fetch();
        $statement->closeCursor();
        return $quote;
    }

    function delete_quote($quote_id) {
        global $db;
        $query = 'DELETE FROM quotes WHERE IndexNum = :quote_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':quote_id', $quote_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_quote($text, $category_id, $author_id) {
        global $db;
        $query = 'INSERT INTO quotes (Text, Author, Category, Category_code, Author_code, IndexNum)
              VALUES
                 (:text, :author, :category, :category_id, :author_id, IndexNum';
        $statement = $db->prepare($query);
        $statement->bindValue(':text', $text);
        $statement->bindValue(':author', $author);
        $statement->bindValue(':category', $category);
        $statement->bindValue(':author_id', $author_id);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $statement->closeCursor();
    }
?>