<main>
    <nav>
        <form action="." method="get" id="make_selection">
            <section id="dropmenus">
                <?php if ( sizeof($categories) != 0) { ?>
                    <label>Category:</label>
                    <select name="category_id">
                        <option value="0">View All Categories</option>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?php echo $category['categoryID']; ?>" <?php echo ($category_name == $category['categoryName'] ? "selected" : false)?>>
                                <?php echo $category['categoryName']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select> 
                <?php } ?>

                <?php if ( sizeof($authors) != 0) { ?>
                    <label>Author:</label>
                    <select name="author_id">
                        <option value="0">View All Authors</option>
                        <?php foreach ($authors as $author) : ?>
                            <option value="<?php echo $author['authorID']; ?>" <?php echo ($author_name == $author['authorName'] ? "selected" : false)?>>
                                <?php echo $author['authorName']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select> 
                <?php } ?>
            </section>
            <section id="sortBy">
                <div>
                    <span>Sort by: </span>
                    <input type="radio" id="sortByAuthor" name="sort" value="author" <?php echo ($sort == "author" ? "checked" : false)?>>
                    <label for="sortByAuthor">Author</label> 
                    <input type="radio" id="sortByCategory" name="sort" value="category" <?php echo ($sort == "category" ? "checked" : false)?>>
                    <label for="sortByCategory">Category</label>
                    <input type="submit" value="Search" class="button blue button-slim">
                    <input id="resetQuoteListForm" type="reset" class="button red button-slim">
                </div>
            </section>
        </form>
    </nav>
    <section>
        <?php if( sizeof($quotes) != 0 ) { ?>
            <div id="table-overflow">
                <table>
                    <thead>
                        <tr>
                            <th>Text</th>
                            <th>Author</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($quotes as $quote) : ?>
                        <tr>
                            <td><?php echo $quote['text']; ?></td>
                            <td><?php echo $quote['author']; ?></td>
                            <td><?php echo $quote['category']; ?></td>
                            <?php if (empty($quote['categoryName'])) { ?>
                                <td>None</td>
                            <?php } else { ?>
                                <td><?php echo $quote['categoryName']; ?></td>
                            <?php } ?>
                            <?php if (empty($quote['authorName'])) { ?>
                                <td>None</td>
                            <?php } else { ?>
                                <td><?php echo $quote['authorName']; ?></td>
                            <?php } ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>  
        <?php } else { ?>
            <p>
                There are no matching quote. 
            </p>     
        <?php } ?>
    </section>
</main>
<script defer src="view/js/main.js" type="text/javascript"></script>