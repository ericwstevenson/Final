<?php 
    require_once('util/valid_admin.php');
?>
<main>
    <h2>Add Quote</h2>
    <form action="admin.php" method="post" id="add_quote_form">
        <input type="hidden" name="action" value="add_quote">

        <label>Category:</label>
        <select name="category_id">
        <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category['Category_code']; ?>">
                <?php echo $category['Category']; ?>
            </option>
        <?php endforeach; ?>
        </select><br>

        <label>Author:</label>
        <select name="author_id">
        <?php foreach ($authors as $author) : ?>
            <option value="<?php echo $author['Author_code']; ?>">
                <?php echo $author['Author']; ?>
            </option>
        <?php endforeach; ?>
        </select><br>

        <label for="text">Text:</label>
        <input type="text" name="text" maxlength="400" required><br>

        <label for="author">Author:</label>
        <input type="text" name="author" maxlength="50" required><br>

        <label for="category">Category:</label>
        <input type="text" name="category" maxlength="50" required><br>

        <label id="blankLabel">&nbsp;</label>
        <input type="submit" value="Add Quote" class="button blue"><br>
    </form>
    <?php include 'view/links.php'; ?>
</main>
