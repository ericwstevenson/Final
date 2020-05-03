<?php 
    function get_all_quotes($sort) {
        global $db;
        if ($sort == 'author'){
            $orderby = 'Q.category';
        } else {
            $orderby = 'Q.author';
        }
        $query = 'SELECT Q.text, Q.author, Q.category 
            FROM quotes Q
            LEFT JOIN authors A ON Q.authorID = A.authorID 
            LEFT JOIN categories C ON Q.categoryID = C.categoryID  
            ORDER BY ' . $orderby . ' DESC';
        $statement = $db->prepare($query);
        $statement->execute();
        $quotes = $statement->fetchAll();
        $statement->closeCursor();
        return $quotes;
    }

    function get_quote($quote_id) {
        global $db;
        $query = 'SELECT * FROM quotes WHERE quoteID = :quote_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':quote_id', $quote_id);
        $statement->execute();
        $quote = $statement->fetch();
        $statement->closeCursor();
        return $quote;
    }

    function delete_quote($quote_id) {
        global $db;
        $query = 'DELETE FROM quotes WHERE quoteID = :quote_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':quote_id', $quote_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_quote($text, $category_id, $author_id) {
        global $db;
        $query = 'INSERT INTO quotes (text, author, category)
              VALUES
                 (:text, :author, :category)';
        $statement = $db->prepare($query);
        $statement->bindValue(':text', $text);
        $statement->bindValue(':author', $author);
        $statement->bindValue(':category', $category);
        $statement->execute();
        $statement->closeCursor();
    }
?>